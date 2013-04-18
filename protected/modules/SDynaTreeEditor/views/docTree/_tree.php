<?php
    $doctree_obj = new DocTree();
    $doctree = $doctree_obj->getDocTreeFormated();
    $this->widget('SDynaTree',array(
	'childrens'=>$doctree,
	'treeId'=>'docTree',
	'minExpandLevel'=>'3',
	'onKeydown'=>"
	function(node, event) {
	if($('.contextMenu:visible').length > 0)
          return false;

        switch( event.which ) {

        // Open context menu on [Space] key (simulate right click)
        case 32: // [Space]
          $(node.span).trigger('mousedown', {
            preventDefault: true,
            button: 2
            })
          .trigger('mouseup', {
            preventDefault: true,
            pageX: node.span.offsetLeft,
            pageY: node.span.offsetTop,
            button: 2
            });
          return false;
	  
	case 67:
          if( event.ctrlKey ) { // Ctrl-C
            copyPaste('copy', node);
            return false;
          }
          break;
        case 86:
          if( event.ctrlKey ) { // Ctrl-V
            copyPaste('paste', node);
            return false;
          }
          break;
        case 88:
          if( event.ctrlKey ) { // Ctrl-X
            copyPaste('cut', node);
            return false;
          }
          break;	
	case 78:
	    if (event.ctrlKey){ // Ctrl-N
		copyPaste('new_folder',node);
		return false;
	    }
	  }
	}",
	
	'onClick'=>"
	function(node, event) {
	    if( $('.contextMenu:visible').length > 0 ){
	    $('.contextMenu').hide();
          	return false;
	    }
	}
	",
	'onCreate'=>"
	function(node, span){
	    bindContextMenu(span);
	    }
	",
	'onActivate'=>"
	    function(node){
		viewNode(node.data.id);
	    }
	",
	));
?>