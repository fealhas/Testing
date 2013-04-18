<?php
/*  A simple class of search objects of classes inheriting ActiveRecord
 *  @author DrunkNinja
*/
class Search
{
    public $class; //classes of objects to be searched
    public $params; //on what parameters will be sought
    public $concatOp = 'AND';
    
    function __construct($class)
    {
        $this->class=$class;
    }

    public function simpleFind ($params)
    {
        
        $foo = new $this->class;
        $c = new CDbCriteria;
        $dateCriteria = new CDbCriteria;
        $catCriteria = new CDbCriteria;
	$visitCriteria = new CDbCriteria;
 
        $categsId = !empty($params['categ_id']) ? $params['categ_id']: null;
        $catCriteria->addInCondition('categ_id', $categsId);
        unset($params['categ_id']);
        /*
         * Process dates and categ_id's
         */
        $date_range = false;
        $condition = null;
        if (!empty($params['date_finish']))
        {
            $val = $params['date_finish'];
            $condition= 'date_finish <= \''.$val.'\'';
            $date_range = true;
            unset($params['date_finish']);
        }
        
        if (!empty($params['date_start']))
        {
            if ($date_range)
                $condition.=' AND ';
            
            $val = $params['date_start'];
            $condition.= 'date_start >= \''.$val.'\'';
			$date_range = true;
            unset($params['date_start']);
        }
	   if (!empty($params['datebegin']))
        {
            if ($date_range)
                $condition.=' AND ';
            
            $val = $params['datebegin'];
            $condition.= 'datebegin >= \''.$val.'\'';
			$date_range = true;
            unset($params['datebegin']);
        }
	   if (!empty($params['dateend']))
        {
            if ($date_range)
                $condition.=' AND ';
            
            $val = $params['dateend'];
            $condition.= 'dateend <= \''.$val.'\'';
			$date_range = true;
            unset($params['dateend']);
        }
	   if (!empty($params['visit_date']))
        {
            if ($date_range)
                $condition.=' AND ';
            
            $val = $params['visit_date'];
            $condition.= 'visit_date = \''.$val.'\'';
			$date_range = true;
            unset($params['visit_date']);
        }



        if (!is_null($condition))
            $dateCriteria->addCondition($condition, $this->concatOp);
        /*
         * 
         */		 
        foreach ($params as $param=>$val)
        {
            $num_field = array ('year', 'birthday', 'deathday', 'divorce_year', 'wedding_year', 'funds'); // numerical поля
            $condition = null;
            if (!empty($val)){
                    if (strstr($val,'%') || strstr($val,'*'))
                    {
                        $condition = $this->getCondition($val, $param);
                        $c->addCondition($condition, $this->concatOp);
                    }
		    else if (in_array($param,$num_field))
                    {
                        $c->addCondition('"'.$param.'" = :'.$param, $this->concatOp);
                        $c->params+=array(':'.$param=>$val);
                    }
		    // from-to part
            		else if ($param=='year_from' || $param=='year_to'){
			    if (empty($params['year_to'])) {
				$condition .= '"'.'year'.'"'.' BETWEEN '.$params['year_from'].' AND 9999';
				} else if (empty($params['year_from'])) {
				$condition .= '"'.'year'.'"'.' BETWEEN 0 AND '.$params['year_to'];
				} else {
				$condition .= '"'.'year'.'"'.' BETWEEN '.$params['year_from'].' AND '.$params['year_to'];
			    }
			    $c->addCondition($condition, $this->concatOp);
		    }
		    // end of from-to part
		    // кусочек для поиска с..по в чит зале
            		else if ($param=='visit_from' || $param=='visit_to'){
			    if (empty($params['visit_to'])) {
				$allVisitId = Visits::model()->findAll(array(
    				'condition'=>'visit_date >= :dateFrom',
    				'params'=>array(':dateFrom'=>$params['visit_from']),
				));
			     } else if (empty($params['visit_from'])) {
				$allVisitId = Visits::model()->findAll(array(
    				'condition'=>'visit_date <= :dateTo',
    				'params'=>array(':dateTo'=>$params['visit_to']),
				));
			     } else {
				$allVisitId = Visits::model()->findAll(array(
    				'condition'=>'visit_date >= :dateFrom AND visit_date <= :dateTo',
    				'params'=>array(':dateFrom'=>$params['visit_from'], ':dateTo'=>$params['visit_to']),
				));
			     }
			    $condition = null;
				$visitIdArr = array();
				$i=0;
			    foreach ($allVisitId as $param=>$val){
				$visitIdArr[$i++] = $val->user_id;
			    }
			    	if (empty($visitIdArr)) $visitIdArr = null;
				$visitCriteria->addInCondition('id',$visitIdArr);
			        $c->mergeWith($visitCriteria, true);
		    }
			// конец

                    else
                    {
                        $condition .= '"'.$param.'"'.' ILIKE \'%'.$val.'%\'';
                        $c->addCondition($condition, $this->concatOp);
                    }
            }
        }
        
        $mergeOp = $this->concatOp=='AND' ? true : false;
        $c->mergeWith($dateCriteria, $mergeOp);
        $c->mergeWith($catCriteria, true);

        
        $crit = $c->condition;
	$c->limit = 2000;
		
        return new CActiveDataProvider ($foo,
                                        array('criteria'=>$c,
                                              'pagination'=>array('pagesize'=>2000,
                                                                  ),
                                              ));;
    }
    
    private function getCondition ($val, $param)
    {
        $val = preg_replace("/\t/"," ",$val);
        $val = str_replace(array('%','*'), array(' OR ',' AND '), $val);
        $condition = null;
        $words = explode(' ',$val);
        if (is_array($words)){
            foreach ($words as $word)
            {
                if (!empty($word)){
                    if ($word!=='OR' && $word!=='AND'){
                        $condition .= '"'.$param.'"'.' ILIKE \'%'.$word.'%\'';
                    }
                    else
                    {
                        $condition .=" $word ";
                    }
                }
            }
        }
        
        return $condition;
    }
}
?>
