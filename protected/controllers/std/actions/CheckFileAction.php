<?php
/*
 *@author vadja
 */
class CheckFileAction extends StdAction
{
    public function run()
    {
            if ((($rec_id = Yii::app()->request->getParam('id'))!==null)&&
            (($cat_id = Yii::app()->request->getParam('cat_id'))!==null)&&
            (($moduleName = Yii::app()->request->getParam('moduleName'))!==null)) {
                $path = "files/".hexdec(dechex(crc32($moduleName)))."/".hexdec(dechex(crc32($cat_id."_".$rec_id)))."/";
                $arr_glob=glob($path."*.*"); 
                echo json_encode(array('isEmpty'=>(sizeof($arr_glob)>0)?false:true));
	    }
	      
    }
}
?>
