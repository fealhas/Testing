<?php
/*
 * @author DrunkNinja
 * @copyright what is office 2011
 */
class SDynaTree extends CWidget{
    
    public $childrens = 'null';
    public $htmlClass = 'null';
    public $checkbox = 'false';
    public $selectMode = '2';
    public $debugLevel = '0';
    public $onActivate = 'null';
    public $onCreate = 'null';
    public $onRender = 'null';
    public $onClick = 'null';
    public $onKeydown = 'null';
    public $treeId = 'tree';
    public $noLink = 'true';
    public $minExpandLevel = '1';
    
    public function init() {
    }
    
    public function _setHtmlOptions()
    {
    }
    
    public function run (){
        $this->render('sdynatree_view', array(
                                              'debugLevel'=>$this->debugLevel,
                                              'childrens'=>$this->childrens,
                                              'htmlClass'=>$this->htmlClass,
                                              'checkbox'=>$this->checkbox,
                                              'selectMode'=>$this->selectMode,
                                              'onActivate'=>$this->onActivate,
                                              'onClick'=>$this->onClick,
                                              'onKeydown'=>$this->onKeydown,
                                              'onCreate'=>$this->onCreate,
                                              'onRender'=>$this->onRender,
                                              'treeId'=>$this->treeId,
                                              'noLink'=>$this->noLink,
                                              'minExpandLevel'=>$this->minExpandLevel,
                    ));
    }
}
?>