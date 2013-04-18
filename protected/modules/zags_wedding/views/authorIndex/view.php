<div id="cat_viewer" style='display: none;'>
<?php
$this->renderPartial('application.modules.zags_wedding.views.authorIndex.cat_view',
					  array('cat'=>Categories::model()->findByPk($model->categ_id),
						));
?>
</div>
<div id="ai_viewer">
<div id="save_update" class="hidden">Данные успешно сохранены!</div>
<div class="row buttons">
<?php
$this->renderPartial('application.modules.zags_wedding.views.authorIndex.updateButtons',
					  array('model'=>$model,
						));
?>
</div>
<?php
$this->renderPartial('application.modules.zags_wedding.views.authorIndex._form',
                                    array('model'=>$model,
                                          ));
?>
</div>