<?php

/**
 * @author DrunkNinja
 */
abstract class StdModel extends CActiveRecord {

    public $max_next_id;
    public $min_next_id;
    /*
     @todo переписать от сих до...
    */
    public function getNextId ($id, $cat_id)
    {
        $criteria = new CDbCriteria;
        
        $criteria->compare('id',">$id", false);
        $criteria->compare('categ_id', $cat_id, false);
        $criteria->select = 'id';
        $criteria->order = "id ASC";
        $cond = $criteria->condition;
        
        $model = $this->find($criteria);
        
        if (!is_null($model))
        {
            $cat = $model->categ_id;
            return $model->id;
        }
        else 
            return null;
    }
    
    public function getPrevId ($id, $cat_id)
    {
        $criteria = new CDbCriteria;
        
        $criteria->compare('id',"<$id", false);
        $criteria->compare('categ_id',$cat_id,false);
        $criteria->order = 'id DESC';
        $cond = $criteria->condition;
        $model = $this->find($criteria);
        
        if (!is_null($model)){
            $cat = $model->categ_id;
            return $model->id;
        }
        else 
            return null;
    }
    
    public function getLastId($cat_id = null)
    {
        $criteria = new CDbCriteria;
        
        if (is_null($cat_id)){
            $criteria->order = "categ_id ASC";
            $model = $this->find($criteria);
            if (!is_null($model))
                $cat_id = $model->categ_id;
            else 
                return null;
        }
        
        $criteria->select = 'id';
        $criteria->compare('categ_id',$cat_id);
        $criteria->order = "id DESC";
        
        $model = $this->find($criteria);
        if (!is_null($model)){
            return $model->id;
        }
        else
            return false;
    }

    public function getFirstId($cat_id = null)
    {
        $criteria = new CDbCriteria;
        
        if (is_null($cat_id)){
            $criteria->order = "categ_id ASC";
            $model = $this->find($criteria);
            if (!is_null($model))
                $cat_id = $model->categ_id;
            else 
                return null;
        }
        
        $criteria->select = 'id';
        $criteria->compare('categ_id',$cat_id);
        $criteria->order = "id ASC";
        
        $model = $this->find($criteria);
        if (!is_null($model)){
            return $model->id;
        }
        else
            return false;
    }


    
    public function getLastNextId ($cat_id)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('categ_id', $cat_id);
        $criteria->select='max(id) as max_next_id';
        $model = $this->find($criteria);
        return $model->max_next_id;
    }
    
    public function getLastPrevId ($cat_id)
    {
        $criteria = new CDbCriteria();
        $criteria->condition="categ_id=$cat_id";
        $criteria->select='min(id) as min_next_id';
        $model = $this->find($criteria);
        $test = $model->min_next_id;
        return $model->min_next_id;
    }
    /*
     @todo ... сих
    */
    
    /*
     * Get total amount of records
     */
    public function getTotalCount($cat_id)
    {                                
        if (is_null($cat_id))
            return 0;

        $conn = self::getDbConnection();
        $tableName = $this->tableName();
        
        $sql = "SELECT COUNT(*) FROM $tableName WHERE categ_id='$cat_id'";
        $dataReader = $conn->createCommand($sql)->query();
        
        $amount = $dataReader->read();
        
        return $amount['count'];
    } 
    
    public function afterFind()
    {
        parent::afterFind();
        if(isset($this->date_start))
            $this->date_start = date("d/m/Y",strtotime($this->date_start));
        if(isset($this->date_finish))
            $this->date_finish = date("d/m/Y",strtotime($this->date_finish));
        if (isset($this->date_year))
            $this->date_year = date("d/m/Y",strtotime($this->date_year));
	 if (isset($this->datebegin))
            $this->datebegin = date("d/m/Y",strtotime($this->datebegin));
	if (isset($this->dateend))
            $this->dateend = date("d/m/Y",strtotime($this->dateend));
	if (isset($this->visit_date))
            $this->visit_date = date("d/m/Y",strtotime($this->visit_date));
    }
    
    public function search() {
        $criteria = new CDbCriteria;

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    
    public function getDbConnection()
    {
        $moduleName = Yii::app()->controller->module->id;
        $connName = 'db_'.strtolower($moduleName);
        return Yii::app()->$connName;
    }
}

?>
