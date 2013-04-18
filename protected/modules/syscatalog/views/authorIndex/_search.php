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
        <tr class="flong">
			<td colspan="8">
			<table>
			<tr>
            <td colspan="8" style="padding:0;padding-top:5px;">
                <?php
                            $value = 'index';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Индекс :', 'index', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                    'htmlOptions' => array('id' => 'srch_index','class' => 'inline_elem, inset', 'tabindex'=>'1')
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
                <td style="padding:0;padding-top:5px;">
                <?php
               $value = 'rubric';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Рубрика :', 'rubric', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                    'htmlOptions' => array('id' => 'srch_rubric', 'class' => 'inline_elem, inset', 'tabindex'=>'2', 'maxlength'=>'200')
                            ));

                            echo $form->error($model, $value);
                            ?>       
            </td>
            <td style="padding:0;padding-top:5px;">
                <?php
               $value = 'subrubric';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Подрубрика :', 'subrubric', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                    'htmlOptions' => array('id' => 'srch_subrubric', 'class' => 'inline_elem, inset', 'tabindex'=>'3', 'maxlength'=>'200')
                            ));

                            echo $form->error($model, $value);
                            ?>              
            </td>
			</tr>
			</table>
			</td>
	</tr>
        <tr>
            <td  colspan="1" width='160px' style="padding:0;padding-top:5px;">
                <?php 
                            /*$value = 'datebegin';//'date_start';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
				*/
                            echo CHtml::label('Крайние даты', 'datebegin', array('class' => 'inline_elem'));
                            /*
                            $this->widget('EJuiComboBox', array(
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'4')
                            ));

                            echo $form->error($model, $value);*/
		?>
</br>
                <?php
                echo CHtml::label('с :&nbsp', 'datebegin', array('class' => 'inline_elem'));
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    //'model' => $model,
                    'name' => 'datebegin',
                    'language' => 'ru',
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'dd/mm/yy',
                        //'defaultDate' => '01/01/1500',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'constrainInput' => true,
                        'showOn' => "button",
						'yearRange' => "-400:c", 
                        'buttonImage' => "/img/input-datepicker.png",
                        'buttonImageOnly' => true
                    ),
                    'htmlOptions' => array(
						'id' => 'srch_datestart',
						'size' => 30,
                        'class' => 'inline_elem dateInput',
			'tabindex'=>'4'
                    ),
                ));
                ?>
          
            </td>
            <td  colspan="1" width='160px' style="padding:0;padding-top:5px;">
                <?php
                            /*$value = 'dateend';//'date_finish';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
*/
                            echo CHtml::label('&nbsp', 'dateend', array('class' => 'inline_elem'));
                           
		?>
</br>
		<?php
				echo CHtml::label('по :&nbsp', 'dateend', array('class' => 'inline_elem'));
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    //'name' => '$model',
                    //'model' => $model,
                    'name' => 'dateend',
                    'language' => 'ru',
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'dd/mm/yy',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'constrainInput' => true,
                        'showOn' => "button",
						'yearRange' => "-400:c", 
                        'buttonImage' => "/img/input-datepicker.png",
                        'buttonImageOnly' => true
                    ),
                    'htmlOptions' => array(
						'id' => 'srch_dateend',
						'size' => 30,
                        'class' => 'inline_elem dateInput',
			'tabindex'=>'5'
                    ),
                ));
                /*
                            $this->widget('EJuiComboBox', array(
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'5')
                            ));

                            echo $form->error($model, $value);*/
                            ?>
            </td>
            <td colspan="5" style="padding:0;padding-top:5px;">
                <?php
                            $value = 'place';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Место события :', 'place', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                    'htmlOptions' => array('id'=>'srch_place','class' => 'inline_elem, inset', 'tabindex'=>'6')
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
    </tr>
        <tr>
            <td  colspan="8" style="padding:0;padding-top:5px;">
                <?php
                $value = 'contents';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Содержание :', 'contents',
                    array('class' => 'inline_elem,'));
                $this->widget('EJuiComboBox', array(
                                'name' => 'srch_contents_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'srch_contents_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                
                                'options' => array(
                                                'onSelect' => "$('#srch_contents').val(item.value);", 
                                            ),
                                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>  
    </tr>
    <tr>
            <td colspan="8" style="padding:0;padding-top:5px;">
               
                <div >
                <?php echo CHtml::textArea('contents','', array('id' => 'srch_contents','style' => 'font-weight:bold','rows' => 4, 'cols' => 80, 'tabindex'=>'7')); ?>
                </div>                
            </td>
</tr>
        <tr>
            <td  colspan="8" style="padding:0;padding-top:5px;">
                <?php
                $value = 'info';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Примечание :', 'info',
                    array('class' => 'inline_elem,'));
                $this->widget('EJuiComboBox', array(
                                'name' => 'srch_info_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'srch_info_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                
                                'options' => array(
                                                'onSelect' => "$('#srch_info').val(item.value);", 
                                            ),
                                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>  
    </tr>
    <tr>
            <td colspan="8" style="padding:0;padding-top:5px;">
               
                <div >
                <?php echo CHtml::textArea('info','', array('id' => 'srch_info','style' => 'font-weight:bold','rows' => 2, 'cols' => 80, 'tabindex'=>'8')); ?>
                </div>                
            </td>
</tr>
		<tr>
			<td colspan="8" style="padding:0;padding-top:5px;">
			<table>
			<tr>
            <td width='15%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'numfond';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Фонд :', 'numfond',
                    array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_numfond', 'class' => 'inline_elem, inset', 'tabindex'=>'9')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
            <td width='10%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'numinventory';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Опись :', 'numinventory',
                    array('class' => 'inline_elem,'));
                $this->widget('EJuiComboBox', array(
                    
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_numinventory', 'class' => 'inline_elem, inset', 'tabindex'=>'10')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>  
	        <td width='12%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'bookinventory';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Дело :", 'bookinventory', array('class' => 'inline_elem'));
                ?>
                <?php
                $this->widget('EJuiComboBox', array(
                    
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_bookinventory', 'class' => 'inline_elem, inset', 'tabindex'=>'11'),
                ));

                echo $form->error($model, $value);
                ?>
            </td>    
	        <td width='8%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'numbook';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Том:", 'numbook', array('class' => 'inline_elem'));
                ?>
                <?php
                $this->widget('EJuiComboBox', array(
                    
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_numbook', 'class' => 'inline_elem, inset', 'tabindex'=>'12'),
                ));

                echo $form->error($model, $value);
                ?>
            </td>  
			<td style="padding:0;padding-top:5px;">
                <?php
                $value = 'sheets';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Л.Л. :', 'sheets',
                    array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_sheets', 'class' => 'inline_elem, inset', 'tabindex'=>'13')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>			
			</tr>
			</table>
			</td>
        </tr>
            <td  colspan="8" style="padding:0;padding-top:5px;">
                <?php
                $value = 'namefond';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Название фонда :', 'namefond',
                    array('class' => 'inline_elem,'));
                $this->widget('EJuiComboBox', array(
                                'name' => 'srch_namefond_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'srch_namefond_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#srch_namefond').val(item.value);", 
                                            ),
                                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>  
	</tr>
	<tr>
            <td colspan="8" style="padding:0;padding-top:5px;">
               
                <div >
                    <?php echo $form->textArea($model, 'namefond', array('id'=>'srch_namefond','style' => 'font-weight:bold','rows' => 2, 'cols' => 80, 'tabindex'=>'14')); ?>
                    <?php echo $form->error($model, 'namefond'); ?>
                </div>                
            </td>
</tr>
		<tr>
			<td colspan="8" style="padding:0;padding-top:5px;">
			<table>
			<tr>
            <td width='15%'	style="padding:0;padding-top:5px;">
                <?php
                            $value = 'namearh';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Название архива :', 'namearh', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                
                                'name' => $value,
                                'data' => $src,
                    'htmlOptions' => array('id' => 'srch_namearh', 'class' => 'inline_elem, inset', 'tabindex'=>'15')
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
            <td width="40%" style="padding:0;padding-top:6px;">
                <?php
                            $value = 'depository';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Номер хранилища (топография) :', 'depository', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                
                                'name' => $value,
                                'data' => $src,
                    'htmlOptions' => array('id' => 'srch_depository', 'class' => 'inline_elem, inset', 'tabindex'=>'16')
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
			<td width='15%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'lang';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Язык документа :', 'lang',
                    array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_lang', 'class' => 'inline_elem, inset', 'tabindex'=>'17')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
            <td width='20%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'method_copy';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Способ воспроизведения :', 'method_copy',
                    array('class' => 'inline_elem,'));
                $this->widget('EJuiComboBox', array(
                    
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_method_copy', 'class' => 'inline_elem, inset', 'tabindex'=>'18')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
			</tr>
			</table>
			</td>
	</tr>
</table>
</div>
<?php
 $this->endWidget(); ?>

</div><!-- form -->
