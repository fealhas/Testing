<div class="form" id='auth_index_form' style="position: absolute; left: 0; right: 0; bottom: 0; top: 40px;">

	<?php
		$form = $this->beginWidget('CActiveForm', array(
		'id' => 'author-index-form',
		'enableAjaxValidation' => false,
		'enableClientValidation' => false,
		'focus' => array($model, 'fund_name'),
		'htmlOptions' => array('style' => 'width:100%; height: 100%;'),
			));

	/*
	Получаем все словари для автодополнения
	*/
	$dict_obj = new Dictionary();
	$dict = $dict_obj->getAllDictionaries();
	unset($dict_obj);

	/*
	Скрытый элемент для хранения id текущей записи
	*/

		echo CHtml::hiddenField('cur_record', $model->id, array('id' => 'curRec'));
		echo $form->hiddenField($model, 'categ_id', array('id' => 'curCat'));
	?>

<table class="formTableIndex">
	
		<tr>	
		<td colspan="12" style="padding:0;">
			<table style="width:80%;">
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Фамилия семьи :'); ?>
				</td>
				<td>
					<?php
						$value = 'family';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'1')));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			</table>

		</td>
	</tr>

		<tr>
		<td style="width:50%;"  colspan="5">
			<table style="text-align:center;width:90%;">
			<tr>
				<td style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Фамилия мужа :'); ?>
				</td>
				<td>
					<?php
						$value = 'lastname_fiance';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'2')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Имя мужа :'); ?>
				</td>
				<td>
					<?php
						$value = 'firstname_fiance';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'3')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Отчество мужа :'); ?>
				</td>
				<td>
					<?php
						$value = 'secondname_fiance';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'4')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Возраст (год рождения) мужа :'); ?>
				</td>
				<td>
					<?php
						$value = 'year_fiance';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'5')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			</table>
		</td>
		<td>
			<table style="text-align:center;width:90%;">
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Фамилия жены :'); ?>
				</td>
				<td>
					<?php
						$value = 'lastname_wife';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'6')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Имя жены :'); ?>
				</td>
				<td>
					<?php
						$value = 'firstname_wife';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'7')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Отчество жены :'); ?>
				</td>
				<td>
					<?php
						$value = 'secondname_wife';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'8')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Возраст (год рождения) жены :'); ?>
				</td>
				<td>
					<?php
						$value = 'year_wife';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'9')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			</table>

		</td>
	</tr>
		<tr>
				<td  style="padding:0;padding-top:5px;width:100px;" width='8%'>
					<?php echo $form->labelEx($model,'Год бракосочетания:'); ?>
				</td>
				<td width='20%'>
					<?php
						$value = 'wedding_year';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'10')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
				<td  style="padding:0;padding-top:5px;width:120px;" width='8%'>
					<?php echo $form->labelEx($model,'Год развода :'); ?>
				</td>
				<td width='20%'>
					<?php
						$value = 'divorce_year';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'11')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
	</tr>
	<tr>
		<td  colspan='12'>
			<table>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Место регистрации:'); ?>
				</td>
				<td>
					<?php
						$value = 'place';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'name' => 'Data_place_textarea',
                        'data' => $src,
                        'htmlOptions'=>array('id'=>'Data_place_textarea', 'class'=>'outset', 'readonly'=>'readonly'),
                        'options' => array(
                        'onSelect' => "$('#Data_place').val(item.value);", 
                                    ),
							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
            <td colspan='12'>
               
                <div >
                    <?php echo $form->textArea($model, 'place', array('id'=>'Data_place','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'12')); ?>
                    <?php echo $form->error($model, 'place'); ?>
                </div>                
            </td>
        </tr>
		<tr>	
		<td colspan="12" style="padding:0;">
			<table style="width:80%;">
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Поисковые данные :'); ?>
				</td>
				<td>
					<?php
						$value = 'info';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'model' => $model,
                     'attribute' => $value,
                     'data' => $src,
                     'htmlOptions' => array('class' => 'inline_elem inset', 'tabindex'=>'13')));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			</table>

		</td>
	</tr>				
		<tr>
		<td  colspan='12'>
			<table>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Примечание :'); ?>
				</td>
				<td>
					<?php
						$value = 'footnote';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'name' => 'Data_footnote_textarea',
                        'data' => $src,
                        'htmlOptions'=>array('id'=>'Data_footnote_textarea', 'class'=>'outset', 'readonly'=>'readonly'),
                        'options' => array(
                        'onSelect' => "$('#Data_footnote').val(item.value);", 
                                    ),
							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
            <td colspan='12'>
               
                <div >
                    <?php echo $form->textArea($model, 'footnote', array('id'=>'Data_footnote','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'14')); ?>
                    <?php echo $form->error($model, 'footnote'); ?>
                </div>                
            </td>
        </tr></table>


<?php
 $this->endWidget(); ?>

</div><!-- form -->
