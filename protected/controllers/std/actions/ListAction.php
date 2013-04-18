<?php
/*
 *@author DrunkNinja
 */
class ListAction extends StdAction
{
    public function run()
    {           
        if(isset($_GET['cast_id']))
        {
                $modelName = $this->getModelName();
                
                $arr['categ_id']=explode(',', $_GET['cast_id']);
                
                $srch = new Search ($modelName);
                $srch->params=$arr;
                $srch->concatOp = 'AND';
                
                $result = $srch->simpleFind($arr);
                $dataProv = $result; 
                
		$sort = new CSort('data');
                $sort->defaultOrder = 'id ASC'; 
                $dataProv->sort = $sort;

                $this->renderPartial('list_result',array(
                        'dataProvider'=>$dataProv,
                        'pagination'=>false,
                                ));               
        }
        //Yii::app()->end();
    }
}
?>
