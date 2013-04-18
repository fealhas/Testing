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
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'1')
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'2')
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'3')
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'4'),
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
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'5')
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr> 
        </tr>
        <tr >
            <td colspan="2">
            <table>
            <tr>
            <td  width='30%' style="padding:0;padding-top:5px;width:160px;">
                <?php
                            /*$value = 'datebegin';//'date_start';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                */
                            echo CHtml::label('Крайние даты :', 'date_start', array('class' => 'inline_elem'));
                            /*
                            $this->widget('EJuiComboBox', array(
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'4')
                            ));

                            echo $form->error($model, $value);*/
        ?>
        <br/>
                <?php
               $value = 'date_start';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'4', 'maxlength'=>'10','placeholder' => 'с')
                            ));

                            echo $form->error($model, $value);
                            ?>  
          
            </td>
            <td  width='30%' style="padding:0;padding-top:5px;width:160px;">
                <?php
                            /*$value = 'dateend';//'date_finish';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
*/
                            echo CHtml::label('&nbsp', 'date_finish', array('class' => 'inline_elem'));

                           
        ?>
        <br/>
                <?php
               $value = 'date_finish';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'5', 'maxlength'=>'10', 'placeholder' => 'по')
                            ));

                            echo $form->error($model, $value);
                            ?>  
            </td>
            <td>
            </td>   
            </tr>
            </table>
            </td>
    </tr>
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
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'8')
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
                                'htmlOptions'=>array('id'=>'Data_info_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_info').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>  
    <tr>
            <td colspan="6" style="padding:0;padding-top:5px;">
               
                <div >
                    <?php echo $form->textArea($model, 'info', array('id'=>'Data_info','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'9')); ?>
                    <?php echo $form->error($model, 'info'); ?>
                </div>                
            </td>
</tr>
	</table>


<?php
 $this->endWidget(); ?>

</div><!-- form -->
