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
            <td  width='10%' style="padding:0;padding-top:5px;">
                <?php
                $value = 'upindex';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Индекс :', 'lib_upindex',
                    array('class' => 'inline_elem', 'style' => 'width: 150px;'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'1')
                ));

                echo $form->error($model, $value, array(), true);
                ?>  
            </td>
            <td width='10%'>
            </td style="padding:0;padding-top:5px;">    
                        <td colspan="3" width='50%'>
                <?php
                /*

                 */
                $value = 'rubric';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Рубрика:", 'lib_rubric', array('class' => 'inline_elem', 'style' => 'width: 80px;'));
                ?>
                <?php
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'3'),
                ));
                ?>
                
            </td>
        </tr>
        <tr>
            <td  width='10%' style='padding-bottom: 5px;'>
                <?php
                $value = 'subindex';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                echo CHtml::label('<hr width=85% size=4px color=#000;>', 'lib_subindex',
                    array('style' => 'padding-top: 7px'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'2')
                ));

                echo $form->error($model, $value, array(), true);
                ?>                               
            </td>
	    <td width='10%'>
            </td>
            <td colspan='3' style="padding:0;padding-top:5px;">
                <?php
                $value = 'subrubric';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Подрубрика:", 'lib_subrubric', array('class' => 'inline_elem', 'style' => 'width: 80px;'));
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
        <tr class="short">
            <td colspan="2" style="padding:0;padding-top:5px;">
                <?php
                    $value = 'year';

                    if (isset($dict[$value]))
                        $src = $dict[$value];
                    else
                        $src = array();

                    echo CHtml::label('Год поступления :', 'lib_year', array('class' => 'inline_elem'));
		    $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'5', 'maxlength'=>'4', 'pattern'=>'[0-9]{4}')
                ));

                echo $form->error($model, $value, array(), true);
                ?>  

                    <?php /*echo $form->error($model,'date_start');*/ $value = $value / 10;?>
                    
                    
            </td>
            <td colspan="2" style="padding:0;padding-top:5px;">
                <?php
                $value = 'history_period';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Исторический период :', 'lib_history_period',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'6')
                ));

                echo $form->error($model, $value, array(), true);
                ?>  
            </td>
            <td colspan="2" style="padding:0;padding-top:5px;">
                <?php
                            /*


                             */
                            $value = 'type_public';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Вид издания:', 'lib_type_public', array('class' => 'inline_elem'));
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
        </tr>
        <tr  >
            <td colspan="6" style="padding:0;padding-top:5px;">
                <?php
                /*


                 */
                $value = 'author';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();


                echo CHtml::label('Автор:', 'lib_author'
                        , array('class' => 'inline_elem'));
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
            <td colspan="6">
                <table>
                    <tr>
                        <td  style="padding:0;padding-top:5px;width:100px;">
                             <?php echo CHtml::label('Название издания:', 'lib_name_public'); ?>
                        </td>
                        <td style="padding:0;padding-top:5px;">
                            <?php
                            $value = 'name_public';
            
                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            $this->widget('EJuiComboBox', array(
                                'name' => 'Libcatalog_name_public_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Libcatalog_name_public_textarea', 'class'=>'outset', 'readonly'=>'readonly'),
                                'options' => array(
                                                'onSelect' => "$('#Libcatalog_name_public').val(item.value);", 
                                            ),
                                
                            ));
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6">
               
                <div >
                    <?php echo $form->textArea($model, 'name_public', array('id'=>'Libcatalog_name_public','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'9')); ?>
                    <?php echo $form->error($model, 'name_public'); ?>
                </div>                
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <table>
                    <tr>
                        <td  style="padding:0;padding-top:5px;width:100px;">
                             <?php echo CHtml::label('Аннотация: ', 'lib_annotation'); ?>
                        </td>
                        <td style="padding:0;padding-top:5px;">
                            <?php
                            $value = 'annotation';
            
                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            $this->widget('EJuiComboBox', array(
                                'name' => 'Libcatalog_annotation_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Libcatalog_annotation_textarea', 'class'=>'outset', 'readonly'=>'readonly'),
                                'options' => array(
                                                'onSelect' => "$('#Libcatalog_annotation').val(item.value);", 
                                            ),
                                
                            ));
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6">
               
                <div >
                    <?php echo $form->textArea($model, 'annotation', array('id'=>'Libcatalog_annotation','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'10')); ?>
                    <?php echo $form->error($model, 'annotation'); ?>
                </div>                
            </td>
        </tr>
        <tr  >
            <td colspan="6" style="padding:0;padding-top:5px;">
                <?php
                /*


                 */
                $value = 'yaer_name_public';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();


                echo CHtml::label('Место и год издания:', 'lib_yaer_name_public'
                        , array('class' => 'inline_elem'));
                ?>                
                <?
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'11')
                ));

                echo $form->error($model, $value);
                ?>
            </td>
        </tr>
        <tr class="flong">
            <td width="50%" colspan="3" style="padding:0;padding-top:5px;">                
                <?php
                $value = 'number';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Инвентарный № :', 'lib_number',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'12')
                ));

                echo $form->error($model, $value, array(), true);
                ?>                
            </td>
            <td colspan="3" style="padding:0;padding-top:5px;">
                <?php
                $value = 'language';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Язык экземпляра (документа):', 'lib_language',array('class' => 'inline_elem'));
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
        <tr>
            <td colspan="3" style="padding:0;padding-top:5px;">
                <?php
                $value = 'source';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Источник поступления:', 'lib_source',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'14')
                ));

                echo $form->error($model, $value, array(), true);
                ?>  
            </td>
            <td colspan="3" style="padding:0;padding-top:5px;">
                 <?php
                $value = 'marks';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Отметки:', 'lib_marks',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'15')
                ));

                echo $form->error($model, $value, array(), true);
                ?>
            </td>
        </tr>
        <tr  >
            <td colspan="6" style="padding:0;padding-top:5px;">
                <?php
                /*


                 */
                $value = 'signature';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();


                echo CHtml::label('Наличие автографа, дарственной подписи:', 'lib_signature'
                        , array('class' => 'inline_elem'));
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
        </tr>
        <tr>
            <td colspan="2" style="padding:0;padding-top:5px;">
                <?php
                $value = 'rack';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Стеллаж:', 'lib_rack',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'maxlength'=>'10', 'tabindex'=>'17')
                ));

                echo $form->error($model, $value, array(), true);
                ?>
            </td>
            <td colspan="2" style="padding:0;padding-top:5px;">
                <?php
                $value = 'locker';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Шкаф:', 'lib_locker',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'maxlength'=>'10', 'tabindex'=>'18')
                ));

                echo $form->error($model, $value, array(), true);
                ?>
            </td>
            <td colspan="2" style="padding:0;padding-top:5px;">
                <?php
                $value = 'board';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Полка:', 'lib_board',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'maxlength'=>'10', 'tabindex'=>'19')
                ));

                echo $form->error($model, $value, array(), true);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <table>
                    <tr>
                        <td  style="padding:0;padding-top:5px;width:100px;">
                            <?php echo CHtml::label('Примечание: ', 'lib_info');?>
                        </td>
                        <td style="padding:0;padding-top:5px;">
                            <?php
                            $value = 'info';
            
                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            $this->widget('EJuiComboBox', array(
                                'name' => 'Libcatalog_info_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Libcatalog_info_textarea', 'class'=>'outset', 'readonly'=>'readonly'),
                                'options' => array(
                                                'onSelect' => "$('#Libcatalog_info').val(item.value);", 
                                            ),
                                
                            ));
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="padding:0;">
                <div >
                    <?php echo $form->textArea($model, 'info', array('id' => 'Libcatalog_info','style' => 'font-weight:bold', 'rows' => 5, 'cols' => 80, 'tabindex'=>'20')); ?>
                    <?php echo $form->error($model, 'info'); ?>
                </div>                
            </td>
        </tr>
    </table>

    <?php $this->endWidget(); ?>

</div><!-- form -->
