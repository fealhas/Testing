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
		$basePath = $this->getModule()->baseScriptUrl; //path to module assets folder
		echo CHtml::imageButton("$basePath/img/icons/actions/book.png", array(
			'onClick'=>'logBuild(); return false;',
			'alt'=>'Книга учета',
			'title'=>'Книга учета',
            		'id'=>'logBtn',
			'class'=>'action_button',
			));
		?>
		<?php
		$basePath = $this->getModule()->baseScriptUrl; //path to module assets folder
		echo CHtml::imageButton("$basePath/img/icons/actions/report.png", array(
			'onClick'=>'repBuild(); return false;',
			'alt'=>'Отчет',
			'title'=>'Отчет',
            		'id'=>'rprtBtn',
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
             <td  colspan="1" width='150px' padding='0' padding-top='5px'>
		<?php echo CHtml::label('№ личного дела :', 'case', array('class' => 'inline_elem')); ?>
        </td> 
            <td colspan="1" width='12%'>
                <?php
                $value = 'case';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_case', 'class' => 'inline_elem, inset', 'tabindex'=>'1')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>

	    <td colspan="1" width='200px'>
	    </td>
             <td colspan="1" width='150px' padding='0' padding-top='5px' text-align='right'>
		<?php echo CHtml::label('Дата посещения :', 'visit_date', array('class' => 'inline_elem')); ?>
	    </td> 
            <td colspan="1" width='400px'>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    //'model' => $model',
                    'name' => 'visit_from',
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
                        'buttonImage' => "/img/input-datepicker.png",
                        'buttonImageOnly' => true
                    ),
                    'htmlOptions' => array(
                        //'class'=>'datepicker',
                        //'style' => 'height:20px;',
                        //'id'=>'srch_visit_date',
                        'size' => 30,
                        'class' => 'inline_elem dateInput',
                    ),
                ));
                ?> <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    //'model' => $model',
                    'name' => 'visit_to',
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
                        'buttonImage' => "/img/input-datepicker.png",
                        'buttonImageOnly' => true
                    ),
                    'htmlOptions' => array(
                        //'class'=>'datepicker',
                        //'style' => 'height:20px;',
                        //'id'=>'srch_visit_date',
                        'size' => 30,
                        'class' => 'inline_elem dateInput',
                    ),
                ));
                ?> 
          <!--  <table>
            <tr>
            <td style="padding:0;padding-top:5px;">
            <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    //'model' => $model',
                    'name' => 'visit_from',
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
                        'buttonImage' => "/img/input-datepicker.png",
                        'buttonImageOnly' => true
                    ),
                    'htmlOptions' => array(
                        //'class'=>'datepicker',
                        //'style' => 'height:20px;',
                        //'id'=>'srch_visit_date',
                        'size' => 30,
                        'class' => 'inline_elem dateInput',
                    ),
                ));
                    ?>
            </td>
            <td style="padding:0;padding-top:5px;">
            <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    //'model' => $model',
                    'name' => 'visit_to',
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
                        'buttonImage' => "/img/input-datepicker.png",
                        'buttonImageOnly' => true
                    ),
                    'htmlOptions' => array(
                        //'class'=>'datepicker',
                        //'style' => 'height:20px;',
                        //'id'=>'srch_visit_date',
                        'size' => 30,
                        'class' => 'inline_elem dateInput',
                    ),
                ));
                    ?>
            </td>
            </tr>
            </table> -->       
            </td>
        <td colspan="1" width='50px'>
        </td>       
    </tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
        <?php echo CHtml::label('Время работы :', 'time', array('class' => 'inline_elem')); ?>
        </td> 
            <td  colspan="6">
                <?php
                $value = 'time';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_time', 'class' => 'inline_elem, inset', 'tabindex'=>'3')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
    </tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
        <?php echo CHtml::label('Фамилия :', 'lastname', array('class' => 'inline_elem')); ?>
        </td> 
            <td  colspan="6">
                <?php
                $value = 'lastname';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_lastname', 'class' => 'inline_elem, inset', 'tabindex'=>'4')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
    </tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
        <?php echo CHtml::label('Имя и отчество :', 'first_second_name', array('class' => 'inline_elem')); ?>
        </td> 
            <td  colspan="6">
                <?php
                $value = 'first_second_name';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_firstname', 'class' => 'inline_elem, inset', 'tabindex'=>'5')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
    </tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
        <?php echo CHtml::label('Должность, ученая степень, звание :', 'dolzhn', array('class' => 'inline_elem')); ?>
        </td> 
            <td  colspan="6">
                <?php
                $value = 'dolzhn';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_dolzhn', 'class' => 'inline_elem, inset', 'tabindex'=>'6')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
    </tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
        <?php echo CHtml::label('Кем командирован :', 'komandirovan', array('class' => 'inline_elem')); ?>
        </td> 
            <td  colspan="6">
                <?php
                $value = 'komandirovan';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_komandirovan', 'class' => 'inline_elem, inset', 'tabindex'=>'7')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
    </tr>
       <tr class="flong">    
             <td  width='10%' padding='0' padding-top='5px'>
        <?php echo CHtml::label('Тема исследования (название, хронологические рамки) :', 'theme', array('class' => 'inline_elem')); ?>
        </td>  
            <td colspan="6">
                <?php
                            $value = 'theme';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => 'zal_theme_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'zal_theme_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_theme').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>  
    <tr class="flong">
            <td colspan="6">
                <div >
                <?php echo CHtml::textArea('theme','', array('id' => 'srch_theme','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'6')); ?>
                </div>              
            </td>
</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
        <?php echo CHtml::label('Цель занятия :', 'goal', array('class' => 'inline_elem')); ?>
        </td> 
            <td  colspan="6">
                <?php
                $value = 'goal';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_goal', 'class' => 'inline_elem, inset', 'tabindex'=>'9')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
    </tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
        <?php echo CHtml::label('Место жительства :', 'place', array('class' => 'inline_elem')); ?>
        </td> 
            <td  colspan="6">
                <?php
                $value = 'place';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_place', 'class' => 'inline_elem, inset', 'tabindex'=>'10')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
    </tr>
</table>
</div>
<?php
 $this->endWidget(); ?>

</div><!-- form -->
