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
            <td colspan="12" style="padding:0;padding-top:5px;">
                <?php
                            $value = 'rubric';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Рубрика/подрубрика :', 'rubric', array('class' => 'inline_elem'));
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
        <td  colspan="7" width='60%'>
            <table>
                <tr>
                    <td style="padding:0;padding-top:5px;">
                        <?php
                        $value = 'type';

                        if (isset($dict[$value]))
                            $src = $dict[$value];
                        else
                            $src = array();

                        echo CHtml::label('Описание ед. хр. (Дата, место, автор, индекс, вид основы и т.д.) :', 'type',
                            array('class' => 'inline_elem'));
                        $this->widget('EJuiComboBox', array(
                                        'name' => 'Data_type_textarea',
                                        'data' => $src,
                                        'htmlOptions'=>array('id'=>'Data_type_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                        'onSelect' => "$('#Data_type').val(item.value);", 
                                                    ),
                                        ));

                        echo $form->error($model, $value, array(), true);
                        ?>        
                    </td>
                </tr>
                <tr>
                    <td>
                       
                        <div >
                            <?php echo $form->textArea($model, 'type', array('id'=>'Data_type','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'2')); ?>
                            <?php echo $form->error($model, 'type'); ?>
                        </div>                
                    </td>
                </tr>
                <tr>
                        <td style="padding:0;padding-top:5px;">
                            <?php
                            $value = 'text';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Аннотация :', 'text',
                                array('class' => 'inline_elem'));
                            $this->widget('EJuiComboBox', array(
                                            'name' => 'Data_text_textarea',
                                            'data' => $src,
                                            'htmlOptions'=>array('id'=>'Data_text_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                            'onSelect' => "$('#Data_text').val(item.value);", 
                                                        ),
                                            ));

                            echo $form->error($model, $value, array(), true);
                            ?>        
                        </td>
                    </tr>
                    <tr>
                        <td>
                           
                            <div >
                                <?php echo $form->textArea($model, 'text', array('id'=>'Data_text','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'3')); ?>
                                <?php echo $form->error($model, 'text'); ?>
                            </div>                
                        </td>
                </tr>
                <tr>
                        <td style="padding:0;padding-top:5px;">
                            <?php
                            $value = 'footnote';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Примечание :', 'footnote',
                                array('class' => 'inline_elem'));
                            $this->widget('EJuiComboBox', array(
                                            'name' => 'Data_footnote_textarea',
                                            'data' => $src,
                                            'htmlOptions'=>array('id'=>'Data_footnote_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                            'onSelect' => "$('#Data_footnote').val(item.value);", 
                                                        ),
                                            ));

                            echo $form->error($model, $value, array(), true);
                            ?>        
                        </td>
                    </tr>
                    <tr>
                        <td>
                           
                            <div >
                                <?php echo $form->textArea($model, 'footnote', array('id'=>'Data_footnote','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'4')); ?>
                                <?php echo $form->error($model, 'footnote'); ?>
                            </div>                
                        </td>
                </tr>
            </table>
        </td>
        <td colspan="6">
            <table>
                <tr>
                    <td style="padding:0;padding-top:5px;">
                        <?php
                                    $value = 'path';

                                    if (isset($dict[$value]))
                                        $src = $dict[$value];
                                    else
                                        $src = array();

                                    //echo CHtml::label('Расположение документа :', 'path', array('class' => 'inline_elem'));
                                    ?>
				 <div style='width: 100%; height: 100%; text-align: center'> 
					<?
					$arr_glog=glob("$src/*.*"); 
					//echo("<img src='$arr_glog[0]'>");
					?>
					
					<script src="elfinder2/js/lightbox.js"></script>
					<link href="elfinder2/css/lightbox.css" rel="stylesheet" />
					
		
                                    <?
					echo "<a href='$src' rel='lightbox'><img src='$src' width='100px' id='Data_path''/></a>"
				    //echo "<img src='$src' width=100% id='Data_path' onload='zoomoff()' onclick='zoomon()'/>";
	/*
					//$pid = $model->id;
					//$value.JPEG";
                                    $this->widget('EJuiComboBox', array(
                                        'model' => $model,
                                        'attribute' => $value,
                                        'data' => $src,
                            'htmlOptions' => array('class' => 'inline_elem, inset')
                                    ));

                                    echo $form->error($model, $value);*/
                                    ?>
				</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="flong">
            <td colspan="12">
                <table>
                    <tr>
                        <td colspan="3"  width='20%' style="padding:0;padding-top:5px;">
                            <?php
                                        $value = 'fund';

                                        if (isset($dict[$value]))
                                            $src = $dict[$value];
                                        else
                                            $src = array();

                                        echo CHtml::label('Фонд :', 'fund', array('class' => 'inline_elem'));
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
                        <td colspan="3"  width='20%' style="padding:0;padding-top:5px;">
                            <?php
                                        $value = 'inventory';

                                        if (isset($dict[$value]))
                                            $src = $dict[$value];
                                        else
                                            $src = array();

                                        echo CHtml::label('Опись :', 'inventory', array('class' => 'inline_elem'));
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
                        <td colspan="3"  width='20%' style="padding:0;padding-top:5px;">
                            <?php
                                        $value = 'case';

                                        if (isset($dict[$value]))
                                            $src = $dict[$value];
                                        else
                                            $src = array();

                                        echo CHtml::label('Дело :', 'case', array('class' => 'inline_elem'));
                                        ?> 
                                        <?
                                        $this->widget('EJuiComboBox', array(
                                            'model' => $model,
                                            'attribute' => $value,
                                            'data' => $src,
                                'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'7')
                                        ));

                                        echo $form->error($model, $value);
                                        ?>
                        </td>
                        <td colspan="3"  width='20%' style="padding:0;padding-top:5px;">
                            <?php
                                        $value = 'tom';

                                        if (isset($dict[$value]))
                                            $src = $dict[$value];
                                        else
                                            $src = array();

                                        echo CHtml::label('Том :', 'tom', array('class' => 'inline_elem'));
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
                </table>
            </td>
    </tr>
    <tr class="flong">
            <td colspan="12">
                <table>
                    <tr>
                         <td width="10%" padding="0" padding-top="5px">
                        <?php echo CHtml::label('№ ед.хр. (Л.л.):', 'sheet', array('class' => 'inline_elem')); ?>
                        </td>  
                        <td colspan="2"  width="20%" style="padding:0;padding-top:5px;">
                            <?php
                            $value = 'sheet';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            $this->widget('EJuiComboBox', array(
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                                'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'9')
                            ));

                            echo $form->error($model, $value, array(), true);
                            ?>        
                        </td>
                         <td width="10%" padding="0" padding-top="5px">
                        <?php echo CHtml::label('Крайние даты:', 'dates', array('class' => 'inline_elem', 'style' => 'float:right')); ?>
                        </td>  
                         <td width="10%" padding="0" padding-top="5px">
                        <?php echo CHtml::label('&nbsp', 'AuthorIndex_date_start', array('class' => 'inline_elem', 'style' => 'float:right')); ?>
                        </td>  
                        <td colspan="2"  width="20%" style="padding:0;padding-top:5px;">
                            <?php
                                $value = 'year1';

                                if (isset($dict[$value]))
                                    $src = $dict[$value];
                                else
                                    $src = array();

                        $this->widget('EJuiComboBox', array(
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                                'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'10', 'maxlength'=>'4', 'pattern'=>'[0-9]{4}','placeholder' => 'с')
                            ));

                            echo $form->error($model, $value, array(), true);
                            ?>  
                        </td>
                         <td width="10%" padding="0" padding-top="5px">
                        <?php echo CHtml::label('&nbsp', 'AuthorIndex_date_finish', array('class' => 'inline_elem', 'style' => 'float:right')); ?>
                        </td>  
                        <td colspan="2"  width='20%' style="padding:0;padding-top:5px;">
                            <?php
                                $value = 'year2';

                                if (isset($dict[$value]))
                                    $src = $dict[$value];
                                else
                                    $src = array();
                        $this->widget('EJuiComboBox', array(
                                'model' => $model,
                                'attribute' => $value,
                                'data' => $src,
                                'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'11', 'maxlength'=>'4', 'pattern'=>'[0-9]{4}','placeholder' => 'по')
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
