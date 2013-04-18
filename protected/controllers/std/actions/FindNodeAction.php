<?php
/*
 @author DrunkNinja
*/
class FindNodeAction extends StdAction
{
    public function run()
    {
        $nodeName = Yii::app()->request->getParam('nodeName');
        if (!empty($nodeName)){
            $docTreeObj = new DocTree();
            $node = $docTreeObj->findNode($nodeName);
            if (!is_null($node))
            {
                echo $node->id;
            }
            else
            {
                echo $node;
            }
        }
    }
}
?>