<div id="search_params" class="wide form" style='float: left;'>

	<div class="row buttons" style="display: inline">
		<?php
		$basePath = $this->getModule()->baseScriptUrl; //path to module assets folder
		echo CHtml::imageButton("$basePath/img/icons/actions/search.png", array(
			'onClick'=>'search(); return false;',
			'alt'=>'Поиск',
			'title'=>'Поиск',
                        'id'=>'srchBtn',
			'class'=>'action_button',
			));
		?>
                <?php
                echo CHtml::imageButton("$basePath/img/icons/actions/clear.png", array(
                    "onClick" => "clearForm('#srch_form'); return false;",
                    'class' => 'action_button',
                    'id' => 'clearBtn',
                    'title' => 'Очистить форму',
                ));
                ?>
	</div>
        <div style="display: inline">
                <?php
                echo CHtml::label('Логика: ','srch_concatOp', array('style'=>'display: inline'));
                echo CHtml::dropDownList ('srch_concatOp', 'AND',
                            array('AND'=>'И',
                                  'OR'=>'ИЛИ',
                                ),
                            array('id'=>'srch_concatOp')
                        );
                ?>
        </div>

	<?php
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'srch_form',
	'enableAjaxValidation'=>false,
	));
	
	/*
	 Получаем все словари для автодополнения
	*/
	$dict_obj = new Dictionary();
	$dict = $dict_obj->getAllDictionaries();
	unset($dict_obj);
	?>

<div style="clear:both;"></div>
<div id="ai">

<table class="formTableIndex"  style="margin-top:40px;">        
	
		<tr>	
		<td colspan="12" style="padding:0;">
			<table style="width:80%;">
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Фамилия семьи:'); ?>
				</td>
				<td>
					<?php
						$value = 'family';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_family', 'class' => 'inline_elem inset', 'tabindex'=>'1')));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			</table>

		</td>
	</tr>

		<tr>
		<td style="width:50%;" colspan="5">
			<table style="text-align:center;width:90%;">
			<tr>
				<td style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Фамилия мужа:'); ?>
				</td>
				<td>
					<?php
						$value = 'lastname_fiance';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_lastname_fiance', 'class' => 'inline_elem inset', 'tabindex'=>'2')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Имя мужа:'); ?>
				</td>
				<td>
					<?php
						$value = 'firstname_fiance';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_firstname_fiance', 'class' => 'inline_elem inset', 'tabindex'=>'3')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Отчество мужа:'); ?>
				</td>
				<td>
					<?php
						$value = 'secondname_fiance';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_secondname_fiance', 'class' => 'inline_elem inset', 'tabindex'=>'4')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Возраст (год рождения) мужа:'); ?>
				</td>
				<td>
					<?php
						$value = 'year_fiance';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_year_fiance', 'class' => 'inline_elem inset', 'tabindex'=>'5')							));

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
					<?php echo $form->labelEx($model,'Фамилия жены:'); ?>
				</td>
				<td>
					<?php
						$value = 'lastname_wife';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_lastname_wife', 'class' => 'inline_elem inset', 'tabindex'=>'6')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Имя жены:'); ?>
				</td>
				<td>
					<?php
						$value = 'firstname_wife';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_firstname_wife', 'class' => 'inline_elem inset', 'tabindex'=>'7')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Отчество жены:'); ?>
				</td>
				<td>
					<?php
						$value = 'secondname_wife';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_secondname_wife', 'class' => 'inline_elem inset', 'tabindex'=>'8')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			<tr>
				<td style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Возраст (год рождения) жены:'); ?>
				</td>
				<td>
					<?php
						$value = 'year_wife';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_year_wife', 'class' => 'inline_elem inset', 'tabindex'=>'9')							));

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
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_wedding_year', 'class' => 'inline_elem inset', 'tabindex'=>'10')							));

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
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_divorce_year', 'class' => 'inline_elem inset', 'tabindex'=>'11')							));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
	</tr>
	<tr>
	<tr>
		<td  colspan="12">
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
						'name' => 'wedding_place_textarea',
                        'data' => $src,
                        'htmlOptions'=>array('id'=>'srch_place_textarea', 'class'=>'outset', 'readonly'=>'readonly'),
                        'options' => array(
                        'onSelect' => "$('#srch_place').val(item.value);", 
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
            <td  colspan="12">
               
                <div >
                <?php echo CHtml::textArea('place','', array('id' => 'srch_place','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'12')); ?>
                </div>                
            </td>
        </tr>
		<tr>	
		<td  colspan="12" style="padding:0;">
			<table style="width:80%;">
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Поисковые данные:'); ?>
				</td>
				<td>
					<?php
						$value = 'info';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
                     'name' => $value,
                     'data' => $src,
                     'htmlOptions' => array('id' => 'srch_info', 'class' => 'inline_elem inset', 'tabindex'=>'13')));

						echo $form->error($model, $value, array(), true);
					?>  
				</td>
			</tr>
			</table>

		</td>
	</tr>				
		<tr>
		<td  colspan="12">
			<table>
			<tr>
				<td  style="padding:0;padding-top:5px;width:100px;">
					<?php echo $form->labelEx($model,'Примечание:'); ?>
				</td>
				<td>
					<?php
						$value = 'footnote';

						if (isset($dict[$value]))
							$src = $dict[$value];
						else
							$src = array();
						$this->widget('EJuiComboBox', array(
						'name' => 'wedding_footnote_textarea',
                        'data' => $src,
                        'htmlOptions'=>array('id'=>'srch_footnote_textarea', 'class'=>'outset', 'readonly'=>'readonly'),
                        'options' => array(
                        'onSelect' => "$('#srch_footnote').val(item.value);", 
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
            <td  colspan="12">
               
                <div >
                <?php echo CHtml::textArea('footnote','', array('id' => 'srch_footnote','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'14')); ?>
                </div>                
            </td>
        </tr></table>
</div>
<?php
 $this->endWidget(); ?>

</div><!-- form -->
