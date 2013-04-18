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
            <td colspan="6" style="padding:0;padding-top:5px;">
                <?php
                            $value = 'fund_name';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Сокращенное название фонда :', 'fund_name', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                    'htmlOptions' => array('id' => 'srch_fund_name', 'class' => 'inline_elem, inset', 'tabindex'=>'1')
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr> 
        <tr>
            <td colspan="8">
            <table>
            <tr>
            <td  colspan="2" width='33%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'surname';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Фамилия :', 'surname',
                    array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_surname', 'class' => 'inline_elem, inset', 'tabindex'=>'2')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
            <td  colspan="2"  width='33%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'name';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Имя :', 'name',
                    array('class' => 'inline_elem,'));
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_name','class' => 'inline_elem, inset', 'tabindex'=>'3')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>  
            <td colspan="2" style="padding:0;padding-top:5px;">
                <?php
                $value = 'fathername';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Отчество :", 'fathername', array('class' => 'inline_elem'));
                ?>
                <?php
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_fathername','class' => 'inline_elem, inset', 'tabindex'=>'4'),
                ));

                echo $form->error($model, $value);
                ?>
            </td> 
            </tr>
            </table>
            </td>         
        </tr>
        <tr>   
            <td colspan="6" style="padding:0;padding-top:5px;">
                <?php
                            $value = 'occupation';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Род занятий (должность) :', 'occupation', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                    'htmlOptions' => array('id' => 'srch_occupation','class' => 'inline_elem, inset', 'tabindex'=>'5')
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr> 
        <tr >
            <td colspan="2">
            <table>
            <tr>
            <td colspan="1" style="padding:0;padding-top:5px;width:145px;">
                 <?php
                            echo CHtml::label('Крайние даты :', 'date_start', array('class' => 'inline_elem'));
        ?>
        <br/>
                <?php echo CHtml::label('с', 'AuthorIndex_date_start', array('class' => 'inline_elem', 'style' => 'width: 17px;')); ?>
                <?php
                /* echo $form->textField ($model, 'date_start', array(
                  'class'=>'inline_elem dateInput',
                  'size'=>30,
                  'id'=>'ai_date_start'
                  )); */
                ?>
                <?php //echo $form->error($model,'date_start'); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    //'model' => $model',
                    'name' => 'date_start',
                    'language' => 'ru',
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'dd/mm/yy',
                        //'defaultDate' => '01/01/1500',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'constrainInput' => true,
						'yearRange' => "-300:c", 
                        'showOn' => "button",
                        'buttonImage' => "/img/input-datepicker.png",
                        'buttonImageOnly' => true
                    ),
                    'htmlOptions' => array(
                        //'class'=>'datepicker',
                        //'style' => 'height:20px;',
                        'id'=>'srch_date_start',
                        'size' => 30,
                        'class' => 'inline_elem dateInput', 'tabindex'=>'6'
                    ),
                ));
                ?>
                <!--</div>-->
                <!---->
                <!--<div class="row input inline_elem">-->
            </td>
            <td colspan="1" style="padding:0;padding-top:5px;width:145px;">              
            <?php
                echo CHtml::label('&nbsp', 'date_finish', array('class' => 'inline_elem'));              
            ?>
            <br/>
			                <?php echo CHtml::label('по', 'AuthorIndex_date_finish', array('class' => 'inline_elem', 'style' => 'width: 17px;')); ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    //'name' => '$model',
                    //'model' => $model',
                    'name' => 'date_finish',
                    'language' => 'ru',
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'dd/mm/yy',
                        //'defaultDate' => '01/01/1500',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'constrainInput' => true,
						'yearRange' => "-300:c", 
                        'showOn' => "button",
                        'buttonImage' => "/img/input-datepicker.png",
                        'buttonImageOnly' => true
                    ),
                    'htmlOptions' => array(
                        //'class'=>'datepicker',
                        //'style' => 'height:20px;',
                        'id'=>'srch_date_finish',
                        'size' => 30,
                        'class' => 'inline_elem dateInput', 'tabindex'=>'7'
                    ),
                ));
                ?>
            </td>
            <td colspan="6">
            </td>
             </tr>
            </table>
            </td>
        </tr>
        <tr>   
            <td colspan="6" style="padding:0;padding-top:5px;">
                <?php
                            $value = 'keywords';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Поисковые данные :', 'keywords', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                    'htmlOptions' => array('id' => 'srch_keywords','class' => 'inline_elem, inset', 'tabindex'=>'8')
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr> 
       <tr>    
             <td  width='10%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Примечание :', 'info', array('class' => 'inline_elem')); ?>
	    </td>  
            <td colspan="6" style="padding:0;padding-top:5px;">
                <?php
                            $value = 'info';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => 'Data_info_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'srch_info_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                
                                'options' => array(
                                                'onSelect' => "$('#srch_info').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>  
    <tr>
            <td colspan="6">
               
                <div >
                <?php echo CHtml::textArea('info','', array('id' => 'srch_info','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'9')); ?>
                </div>                
            </td>
</tr>
    </table>
</div>
<?php
 $this->endWidget(); ?>

</div><!-- form -->
