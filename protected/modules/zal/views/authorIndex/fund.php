<div class="form" id='auth_index_form' style="position: absolute; left: 0; right: 0; bottom: 0; top: 40px;">

	<?php
		$form = $this->beginWidget('CActiveForm', array(
		'id' => 'fund-form',
		'enableAjaxValidation' => false,
		'enableClientValidation' => false,
		//'focus' => array($model, 'fund_n'),
		'htmlOptions' => array('style' => 'width:800px; height: 600px;'),
			));

		echo CHtml::hiddenField('cur_record', $model->id, array('id' => 'curRec'));
		echo $form->hiddenField($model, 'categ_id', array('id' => 'curCat'));
	?>
	
	<table class="formTableIndex">
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
                <div >
                    <?php echo $form->textArea($model, 'fund_n', array('id'=>'fund_n','style' => 'font-weight:bold','rows' => 20, 'cols' => 80, 'tabindex'=>'1')); ?>
                    <?php echo $form->error($model, 'fund_n'); ?>
                </div>   
			</td>
		</tr>
	</table>

<?php
 $this->endWidget(); ?>

</div>