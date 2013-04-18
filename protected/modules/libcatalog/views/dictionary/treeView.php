<div id='dictionary_tree' style="float: left; margin-right:10%; overflow-y: visible;">
<?php
    $names = $model->getTreeViewDataFormatted();	
    $this->widget('CTreeView', array(
    'data'=>$names,
    'htmlOptions'=>array('class'=>'treeview-grey'),
    'collapsed'=>true,
    ));
?>
</div>