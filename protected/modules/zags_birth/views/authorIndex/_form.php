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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'1')
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'2')
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'3')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
        <tr class="flong"> 
             <td  width='5%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Год рождения :', 'birthday', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  width='20%' min-width='100px'>
                <?php
                $value = 'birthday';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'4')
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
                                'name' => 'Data_registr_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_registr_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_registr').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>  
    <tr class="flong">
            <td colspan="6">
               
                <div >
                    <?php echo $form->textArea($model, 'registr', array('id'=>'Data_registr','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'5')); ?>
                    <?php echo $form->error($model, 'registr'); ?>
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
                                'name' => 'Data_place_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_place_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_place').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>  
    <tr class="flong">
            <td colspan="6">
               
                <div >
                    <?php echo $form->textArea($model, 'place', array('id'=>'Data_place','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'6')); ?>
                    <?php echo $form->error($model, 'place'); ?>
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'7')
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
                                'name' => 'Data_footnote_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_footnote_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_footnote').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>  
    <tr class="flong">
            <td colspan="6">
               
                <div >
                    <?php echo $form->textArea($model, 'footnote', array('id'=>'Data_footnote','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'8')); ?>
                    <?php echo $form->error($model, 'footnote'); ?>
                </div>                
            </td>
</tr>
</table>


<?php
 $this->endWidget(); ?>

</div><!-- form -->
