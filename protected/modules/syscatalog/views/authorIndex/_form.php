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
			<td colspan="8">
			<table>
			<tr>
            <td style="padding:0;padding-top:5px;">
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
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'1', 'maxlength'=>'200')
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
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'2', 'maxlength'=>'200')
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
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'3', 'maxlength'=>'200')
                            ));

                            echo $form->error($model, $value);
                            ?>              
            </td>
			</tr>
			</table>
			</td>
	</tr>
        <tr >
            <td  width='160px' style="padding:0;padding-top:5px;">
                <?php
                            /*$value = 'datebegin';//'date_start';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
				*/
                            echo CHtml::label('Крайние даты :', 'datebegin', array('class' => 'inline_elem'));
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
               $value = 'datebegin';

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
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'4', 'maxlength'=>'10','placeholder' => 'c')
                            ));

                            echo $form->error($model, $value);
                            ?>  
          
            </td>
            <td  width='160px' style="padding:0;padding-top:5px;">
                <?php
                            /*$value = 'dateend';//'date_finish';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
*/
                            echo CHtml::label('&nbsp', 'dateend', array('class' => 'inline_elem'));

                           
		?>
		<br/>
                <?php
               $value = 'dateend';

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
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'5', 'maxlength'=>'10','placeholder' => 'по')
                            ));

                            echo $form->error($model, $value);
                            ?>  
            </td>
            <td colspan='6' style="padding:0;padding-top:5px;">
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
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'6')
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
                                'name' => 'Data_contents_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_contents_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_contents').val(item.value);", 
                                            ),
                                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>  
	</tr>
	<tr>
            <td colspan="8" style="padding:0;padding-top:5px;">
               
                <div >
                    <?php echo $form->textArea($model, 'contents', array('id'=>'Data_contents','style' => 'font-weight:bold','rows' => 4, 'cols' => 80, 'tabindex'=>'7')); ?>
                    <?php echo $form->error($model, 'contents'); ?>
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
                                'name' => 'Data_info_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_info_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_info').val(item.value);", 
                                            ),
                                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>  
	</tr>
	<tr>
            <td colspan="8" style="padding:0;padding-top:5px;">
               
                <div >
                    <?php echo $form->textArea($model, 'info', array('id'=>'Data_info','style' => 'font-weight:bold','rows' => 2, 'cols' => 80, 'tabindex'=>'8')); ?>
                    <?php echo $form->error($model, 'info'); ?>
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'9')
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'10')
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'11'),
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'12'),
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'13')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>			
			</tr>
			</table>
			</td>
        </tr>
       <!-- <tr>
            <td  colspan="8" style="padding:0;padding-top:5px;">
                <?php
                $value = 'sheets';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Л.л. :', 'sheets',
                    array('class' => 'inline_elem,'));
                $this->widget('EJuiComboBox', array(
                                'name' => 'Data_sheets_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_sheets_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_sheets').val(item.value);", 
                                            ),
                                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>  
	</tr>
	<tr>
            <td colspan="8" style="padding:0;padding-top:5px;">
               
                <div >
                    <?php echo $form->textArea($model, 'sheets', array('id'=>'Data_sheets','style' => 'font-weight:bold','rows' => 2, 'cols' => 80, 'tabindex'=>'14')); ?>
                    <?php echo $form->error($model, 'sheets'); ?>
                </div>                
            </td>
        <tr>-->
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
                                'name' => 'Data_namefond_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_namefond_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_namefond').val(item.value);", 
                                            ),
                                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>  
	</tr>
	<tr>
            <td colspan="8" style="padding:0;padding-top:5px;">
               
                <div >
                    <?php echo $form->textArea($model, 'namefond', array('id'=>'Data_namefond','style' => 'font-weight:bold','rows' => 2, 'cols' => 80, 'tabindex'=>'15')); ?>
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
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'16')
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
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'17')
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'18')
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
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'19')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
			</tr>
			</table>
			</td>
	</tr>
</table>


<?php
 $this->endWidget(); ?>

</div><!-- form -->
