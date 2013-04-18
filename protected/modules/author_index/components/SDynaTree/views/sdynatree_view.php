<?php
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerScriptFile('/js/libs/jquery.cookie.js');
Yii::app()->clientScript->registerScriptFile('/js/libs/jquery.preload-min.js');
Yii::app()->clientScript->registerScriptFile('/js/libs/cMenu/jquery.contextMenu.js');
Yii::app()->clientScript->registerScriptFile('/js/libs/dynatree/jquery.dynatree.min.js');
Yii::app()->clientScript->registerCssFile('/css/cMenu/jquery.contextMenu.css');
Yii::app()->clientScript->registerCssFile('/css/skin-vista/ui.dynatree.css');
?>
<?php

$nodes = json_encode($childrens);

$script_test = "
$(function(){
        $('#$treeId').dynatree({
            debugLevel: $debugLevel,
            persist: true,
            selectMode: $selectMode,
            checkbox: $checkbox,
            onActivate: $onActivate,
            onCreate: $onCreate,
            onRender: $onRender,
            onClick: $onClick,
            onKeydown: $onKeydown,
            children: $nodes,
            minExpandLevel: $minExpandLevel,
        });
    });
";

$script_id = 'dynatree_'.rand(0,1000);
Yii::app()->clientScript->registerScript($script_id, $script_test, CClientScript::POS_HEAD);
?>