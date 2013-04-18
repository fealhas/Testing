<div class="dtree" id="doctree_search">
    <?php
    $doctree_obj = new Categories();
    $doctree = $doctree_obj->getDocTreeFormated();
    $this->widget('SDynaTree',array(
	'childrens'=>$doctree,
	'htmlClass'=>'.dtree',
	'selectMode'=>'3',
	'checkbox'=>'true',
	'treeId'=>'doctree_search',
	'minExpandLevel'=>'2'
	));
    ?>
</div>