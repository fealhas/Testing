<div class="dtree" id="doctree">
   <?php
    $isFilial = Yii::app()->user->checkAccess('filial') && !(Yii::app()->user->getIsSuperuser());
    $doctree_obj = new Categories();
    $doctree = $doctree_obj->getDocTreeFormated();
    $this->widget('SDynaTree',array(
	'childrens'=>$doctree,
	'treeId'=>'doctree',
	'selectMode'=>'1',
	'onActivate'=>"function(node) {
	    $('#curCat').val(node.data.id);
            viewCat(node.data.id, node.data.isFolder);
 	// если юзер из филиала - дать доступ в зависимости от роли базы	
		var title = node.data.title;
		if ('$isFilial') {
               	  if (~title.toLowerCase().indexOf('Филиал'.toLowerCase())) {
		     $('.editor_button').show();
		  } else {
		     $('.editor_button').hide();
		  }
		}
        }",
	'minExpandLevel'=>'2'
	));
    ?>
</div>
