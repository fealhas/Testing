<?php
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile('/js/libs/jquery.cookie.js');
Yii::app()->clientScript->registerScriptFile('/js/libs/jquery.preload-min.js');
Yii::app()->clientScript->registerCoreScript('jquery.ui');
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
            dnd: {
                onDragStart: function(node) {
                        return true;
                      },
                      autoExpandMS: 1000,
                      preventVoidMoves: true, // Prevent dropping nodes 'before self', etc.
                      onDragEnter: function(node, sourceNode) {
                        return true;
                      },
                      onDragOver: function(node, sourceNode, hitMode) {
                        if(node.isDescendantOf(sourceNode))
                          return false;
                      },
                      onDrop: function(node, sourceNode, hitMode, ui, draggable) {
                        var srcLvl = sourceNode.getLevel();
                        var nodeLvl = node.getLevel();
                        var isLower = false; //if sourceNode level become smaller than node level
                        var isEqual = false;
                        
                        if (srcLvl===nodeLvl)
                        {
                            console.log('equal');
                            isEqual = true;
                        }
                        else if (srcLvl<nodeLvl)
                        {
                            console.log('lower');
                            isLower = true;
                        }
                        else
                        {
                            console.log('higher');
                        }
                        
                        sourceNode.move(node, hitMode);
                        
                        var newSrcLvl = sourceNode.getLevel();
                        var newNodeLvl = node.getLevel();
                        
                        if (isLower)
                        {
                            if (newSrcLvl>newNodeLvl)
                            {
                                sourceNode.data.parent_id = node.data.id;
                            }
                            else
                            {
                                sourceNode.data.parent_id = node.data.parent_id;
                            }
                        }
                        else if (isEqual)
                        {
                            if (newSrcLvl>newNodeLvl)
                            {
                                sourceNode.data.parent_id = node.data.id;
                            }
                            else if (newSrcLvl===newNodeLvl)
                            {
                                sourceNode.data.parent_id = node.data.parent_id;
                            }
                            else
                            {
                                sourceNode.data.parent_id = node.data.parent_id;
                            }
                        }
                        else
                        {
                            if (newSrcLvl>newNodeLvl)
                            {
                                sourceNode.data.parent_id = node.data.id;
                            }
                            else
                            {
                                sourceNode.data.parent_id = node.data.parent_id;
                            }
                        }
                        
                        var parNode = $('#$treeId').dynatree('getTree').getNodeByKey(sourceNode.data.parent_id);
                        var childrens = parNode.getChildren();
                        if (childrens !=null)
                        {
                            var size = childrens.length;
                            for (var i=0; i<size; i++)
                            {
                                var node = childrens[i];
                                node.data.orderstate = i;
                                node.data.change_state = 'replaced';
                            }
                        }
                        //sourceNode.data.change_state = 'replaced';

                        //sourceNode.setTitle(sourceNode.data.id+'_'+sourceNode.data.orderstate);
                      },
                    }
        });
    });
";

$script_id = 'dynatree_'.rand(0,1000);
Yii::app()->clientScript->registerScript($script_id, $script_test, CClientScript::POS_HEAD);
?>