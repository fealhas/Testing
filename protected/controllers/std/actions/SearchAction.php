<?php
/*
 *@author DrunkNinja
 */
class SearchAction extends StdAction
{
    public function run()
    {
        if(isset($_POST['data']))
        {
                $modelName = $this->getModelName();
                
                $_POST['data']['search_params']['categ_id']=$_POST['data']['cats_id'];
                $search_params = $_POST['data']['search_params'];

                $srch = new Search ($modelName);
                $srch->params=$search_params;;
                $srch->concatOp = $_POST['concatOp'];
                
                $result = $srch->simpleFind($search_params);
                $dataProv = $result;
                
                $this->renderPartial('search_result',array(
                        'dataProvider'=>$dataProv,
                        'pagination'=>false,
                                ));
                
        }
    }
}
?>