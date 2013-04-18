<div class="dtree" id="doctree">
   <?php
    $isCentr = Yii::app()->user->checkAccess('centr') && !(Yii::app()->user->getIsSuperuser());
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

	      // если юзер из центра - дать доступ в зависимости от роли базы	
		var title = node.data.title;
		if ('$isCentr') {
			//alert ('centr');
               	  if (~title.toLowerCase().indexOf('центр'.toLowerCase())) {
			//alert ('show');
		     $('.editor_button').show();
		  } else {
			//alert ('hide');
		     $('.editor_button').hide();
		  }
		}
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
