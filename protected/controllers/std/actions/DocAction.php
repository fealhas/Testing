<?php
/*
 *@author DrunkNinja
 */
class DocAction extends StdAction
{
    public function run()
    {           
        if(isset($_GET['htmlToDoc']) && isset($_GET['filename']) )
        {
		$docData = $_GET['htmlToDoc'];
		$filename = $_GET['filename'];

                $this->renderPartial('doc_result',array(
			'docData' => $docData,
			'filename' => $filename,
                                ));               
        }
    }
}
?>
