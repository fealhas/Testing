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
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Фамилия :', 'lastname', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="4">
                <?php
                $value = 'lastname';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_lastname', 'class' => 'inline_elem, inset', 'tabindex'=>'1')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Имя :', 'firstname', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="4">
                <?php
                $value = 'firstname';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_firstname', 'class' => 'inline_elem, inset', 'tabindex'=>'2')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Отчество :', 'secondname', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="4">
                <?php
                $value = 'secondname';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_secondname', 'class' => 'inline_elem, inset', 'tabindex'=>'3')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Год рождения :', 'birthday', array('class' => 'inline_elem')); ?>
	    </td> 
            <td width='20%'>
                <?php
                $value = 'birthday';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'birthday', 'class' => 'inline_elem, inset', 'tabindex'=>'4')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	    <td width='68%'>
	    </td>		
	</tr>
       <tr class="flong">    
             <td  width='10%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Место регистрации :', 'registr', array('class' => 'inline_elem')); ?>
	    </td>  
            <td colspan="6">
                <?php
                            $value = 'registr';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => 'birth_registr_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'srch_registr_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#srch_registr').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>  
    <tr class="flong">
            <td colspan="6">
               
                <div >
                <?php echo CHtml::textArea('registr','', array('id' => 'srch_registr','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'5')); ?>
                </div>                
            </td>
</tr>
       <tr class="flong">    
             <td  width='10%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Место рождения (Усыновление):', 'place', array('class' => 'inline_elem')); ?>
	    </td>  
            <td colspan="6">
                <?php
                            $value = 'place';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => 'birth_place_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'srch_place_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#srch_place').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>  
    <tr class="flong">
            <td colspan="6">
               
                <div >
                <?php echo CHtml::textArea('place','', array('id' => 'srch_place','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'6')); ?>
                </div>                
            </td>
</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Поисковые данные :', 'info', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="6">
                <?php
                $value = 'info';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_info', 'class' => 'inline_elem, inset', 'tabindex'=>'7')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
       <tr class="flong">    
             <td  width='10%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Примечание :', 'footnote', array('class' => 'inline_elem')); ?>
	    </td>  
            <td colspan="6">
                <?php
                            $value = 'footnote';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => 'birth_footnote_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'srch_footnote_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#srch_footnote').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>  
    <tr class="flong">
            <td colspan="6">
               
                <div >
                <?php echo CHtml::textArea('footnote','', array('id' => 'srch_footnote','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'8')); ?>
                </div>                
            </td>
</tr>
</table>
</div>
<?php
 $this->endWidget(); ?>

</div><!-- form -->
