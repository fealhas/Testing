<?php
/*
 *@author vadja
 */
class ReportAction extends StdAction
{
    public function run()
    {
        if(isset($_POST['data']))
        {
		
                $modelName = $this->getModelName();
                
                $categ = $_POST['data']['cats_id'];
		$report_params = json_decode($_POST['data']['report_params']);
   		$year_name = $_POST['data']['year_name'];

		$srch = new Search ($modelName);
		foreach($report_params as $key=>$value){
			foreach($value as $p_key=>$param){
			$search_params = array($key => $param, 'categ_id'=>$categ);
                	$srch->params = $search_params;
                	
                	$result = $srch->simpleFind($search_params);

			$report_res['total'][$param] = $result->totalItemCount;
			
			$search_params = array($key => $param, $year_name=>date("Y"), 'categ_id'=>$categ);

			$srch->params = $search_params;
			$srch->concatOp = "AND";

			$result = $srch->simpleFind($search_params);

			$report_res['year'][$param] = $result->totalItemCount;
			}
		}
		 
                $this->renderPartial('report_result',array(
			'report_res'=>$report_res,
                                ));
                
        }
    }
}
?>
