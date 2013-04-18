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
            <td  colspan="2" width='20%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'file_number';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Номер подшивки :', 'file_number',
                    array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'1')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
            <td  colspan="2" width='30%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'date_year3';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Год издания :', 'date_year3',
                    array('class' => 'inline_elem', 'style' => 'width: 150px;'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'2')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>  
	        <td colspan="2" width='30%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'historical_period';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Исторический период :", 'historical_period', array('class' => 'inline_elem'));
                ?>
                <?php
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'3'),
                ));

                echo $form->error($model, $value);
                ?>
            </td>          
        </tr>
        <tr>    
            <td colspan="6" style="padding:0;padding-top:5px;">
                <?php
                            $value = 'masthead';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Название газеты :', 'masthead', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'4')
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr> 
        <tr>          <tr> <td colspan="6"> 
                <table>
                    <tr>             <td  width='10%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Дата издания :', 'publish_date', array('class' => 'inline_elem')); ?>
	    </td>  
            <td style="padding:0;padding-top:5px;">
                <?php
                            $value = 'publish_date';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => 'Data_publish_date_textarea',
                                'data' => $src,
                                //'model' => $model,
                                //'attribute' => $value,
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_publish_date_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_publish_date').val(item.value);", 
                                            ),
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
                    </tr>
                </table>
            </td>
        </tr>  
    <tr>
            <td colspan="6">
               
                <div >
                    <?php echo $form->textArea($model, 'publish_date', array('id'=>'Data_publish_date','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'5')); ?>
                    <?php echo $form->error($model, 'publish_date'); ?>
                </div>                
            </td>
        </tr>      
        <tr> <td colspan="6"> 
                <table>
                    <tr>  
            <td  width='10%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Номер газеты :', 'newspaper_number', array('class' => 'inline_elem')); ?>
	    </td>    
            <td style="padding:0;padding-top:5px;">
                <?php
                            $value = 'newspaper_number';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => 'Data_newspaper_number_textarea',
                                'data' => $src,
                                //'model' => $model,
                                //'attribute' => $value,
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_newspaper_number_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_newspaper_number').val(item.value);", 
                                            ),
                                ));

                            echo $form->error($model, $value);
                            ?>
            </td>
                    </tr>
                </table>
            </td>
        </tr>  
    <tr>
            <td colspan="6">
               
                <div >
                    <?php echo $form->textArea($model, 'newspaper_number', array('id'=>'Data_newspaper_number','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'6')); ?>
                    <?php echo $form->error($model, 'newspaper_number'); ?>
                </div>                
            </td>
</tr>  
        <tr> <td colspan="6"> 
                <table>
                    <tr>  
            <td  width='10%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Орган и место издания :', 'place_of_public', array('class' => 'inline_elem')); ?>
	    </td>    
            <td style="padding:0;padding-top:5px;">
                <?php
                            $value = 'place_of_public';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => 'Data_place_of_public_textarea',
                                'data' => $src,
                                //'model' => $model,
                                //'attribute' => $value,
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_place_of_public_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_place_of_public').val(item.value);", 
                                            ),
                                ));

                            echo $form->error($model, $value);
                            ?>
            </td>
                    </tr>
                </table>
            </td>
        </tr>  
    <tr>
            <td colspan="6">
               
                <div >
                    <?php echo $form->textArea($model, 'place_of_public', array('id'=>'Data_place_of_public','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'7')); ?>
                    <?php echo $form->error($model, 'place_of_public'); ?>
                </div>                
            </td>
</tr>
		<tr>
	        <td colspan='2' style="padding:0;padding-top:5px;">
                <?php
                $value = 'newspaper_lang';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Язык подшивки (газеты):", 'newspaper_lang', array('class' => 'inline_elem'));
                ?>
                <?php
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'8'),
                ));

                echo $form->error($model, $value);
                ?>
            </td>
	        <td colspan='3' style="padding:0;padding-top:5px;">
                <?php
                $value = 'marks';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Отметки :", 'marks', array('class' => 'inline_elem'));
                ?>
                <?php
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'9'),
                ));

                echo $form->error($model, $value);
                ?>
            </td>          
		</tr>
	<tr>
	    <td colspan='2' style="padding:0;padding-top:5px;">
                <?php
                $value = 'rack';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Стеллаж :", 'rack', array('class' => 'inline_elem'));
                ?>
                <?php
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'10'),
                ));

                echo $form->error($model, $value);
                ?>
            </td>
            <td  colspan="2" width='20%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'locker';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Шкаф :', 'locker',
                    array('class' => 'inline_elem', 'style' => 'width: 150px;'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'11')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>    
		    <td  colspan="2" style="padding:0;padding-top:5px;">
                <?php
                $value = 'shelf';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Полка :', 'shelf',
                    array('class' => 'inline_elem', 'style' => 'width: 150px;'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'12')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
        <tr> <td colspan="6"> 
                <table>
                    <tr>  
            <td  width='10%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Примечание:', 'footnote', array('class' => 'inline_elem')); ?>
	    </td>    
            <td style="padding:0;padding-top:5px;">
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
                                //'model' => $model,
                                //'attribute' => $value,
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_footnote_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_footnote').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
                    </tr>
                </table>
            </td>
        </tr>  
    <tr>
            <td colspan="6">
               
                <div >
                    <?php echo $form->textArea($model, 'footnote', array('id'=>'Data_footnote','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'13')); ?>
                    <?php echo $form->error($model, 'footnote'); ?>
                </div>                
            </td>
</tr>
	</table>


<?php
 $this->endWidget(); ?>

</div><!-- form -->
