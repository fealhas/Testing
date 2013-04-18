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

	<?php $form=$this->beginWidget('CActiveForm', array(
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
    <table class="formTableIndex" style="margin-top:40px;">
        <tr class="flong">
            <td  colspan="2" width='20%'>
                <?php
                $value = 'upindex';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Верхний индекс :', 'srch_upindex',
                    array('class' => 'inline_elem', 'style' => 'width: 150px;'));
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_upindex','class' => 'inline_elem')
                ));

                //echo $form->error($model, $value, array(), true);
                ?>                 
            </td>
            <td colspan="3" width='50%'>
                <?php
                $value = 'rubric';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Рубрика:", 'srch_rubric', array('class' => 'inline_elem', 'style' => 'width: 80px;'));
                ?>
                <?php
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_rubric', 'class' => 'inline_elem'),
                ));
                ?> 
                
            </td>
        </tr>
        <tr>    
            <td  colspan="2" style='padding-bottom: 5px;'>
                <?php
                $value = 'subindex';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                echo CHtml::label('Нижний индекс :', 'srch_subindex',
                    array('class' => 'inline_elem', 'style' => 'width: 150px;'));
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_subindex','class' => 'inline_elem',)
                ));

                //echo $form->error($model, $value, array(), true);
                ?>  
                              
            </td>


            <td colspan='3'>
                <?php
                /*

                 */
                $value = 'subrubric';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label("Подрубрика:", 'srch_subrubric', array('class' => 'inline_elem', 'style' => 'width: 80px;'));
                ?>
                <?php
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_subrubric', 'class' => 'inline_elem'),
                ));
                ?>
            </td>
        </tr>
        <tr class="short">
            <td colspan="2">
                <?php

                    $value = 'year';

                    if (isset($dict[$value]))
                        $src = $dict[$value];
                    else
                        $src = array();

                    echo CHtml::label('Год поступления :', 'srch_year', array('class' => 'inline_elem'));
                    ?>

                    <?php
                    $this->widget('EJuiComboBox', array(
                        'name'=>$value,
                        'data' => $src,
                        'htmlOptions' => array(
                            'id'=>'srch_dateSingle',
                            'size' => 30,
                            'class' => 'inline_elem'
                        ),
                    ));
                    ?>
<table>
<tr>
<td>
<?php
                    $this->widget('EJuiComboBox', array(
                        'name'=>'year_from',
                        'data' => '',
                        'htmlOptions' => array(
                            'id'=>'srch_from',
                            'size' => 30,
                            //'class' => 'inline_elem',
			    'placeholder' => 'c'
                        ),
                    ));
                    ?>
</td>
<td>
<?php
                    $this->widget('EJuiComboBox', array(
                        'name'=>'year_to',
                        'data' => '',
                        'htmlOptions' => array(
                            'id'=>'srch_to',
                            'size' => 30,
                            //'class' => 'inline_elem',
			    'placeholder' => 'по'
                        ),
                    ));
                    ?>
</td>
</tr>
</table>
            </td>
            <td colspan="2">
                <?php
                $value = 'history_period';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Исторический период :', 'srch_history_period',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_history_period','class' => 'inline_elem')
                ));

                echo $form->error($model, $value, array(), true);
                ?>  
            </td>
            <td colspan="2">
                <?php
                            /*


                             */
                            $value = 'type_public';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label('Вид издания:', 'srch_type_public', array('class' => 'inline_elem'));
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                //'model' => $model,
                                'name' => $value,
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'srch_type_public'),
                            ));

                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>
        <tr  >
            <td colspan="6">
                <?php
                /*


                 */
                $value = 'author';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();


                echo CHtml::label('Автор:', 'srch_author'
                        , array('class' => 'inline_elem'));
                ?>                
                <?
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
			'htmlOptions'=>array('id'=>'srch_author'),
                ));

                echo $form->error($model, $value);
                ?>
            </td>
        </tr>
        <tr  >
            <td colspan="6">
                <table>
		<tr>
		<td style="padding:0;padding-top:5px;width:100px;">
                <?php
                /*


                 */
                $value = 'name_public';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();


                echo CHtml::label('Название издания:', 'srch_name_public'
                        , array('class' => 'inline_elem'));
                ?> 
		</td>
		<td>               
                <?
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                        'htmlOptions'=>array('id'=>'srch_name_public', 'class'=>'outset', 'readonly'=>'readonly' ),
			'options' => array('onSelect' => "$('#srch_name').val(item.value);", 
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
                    <?php echo CHtml::textArea('name_public','', array('id'=>'srch_name','style' => 'font-weight:bold','rows' => 5, 'cols' => 80)); ?>
                </div>                
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <table>
                    <tr>
                        <td  style="padding:0;padding-top:5px;width:100px;">
                             <?php echo CHtml::label('Аннотация: ', 'srch_annotation'); ?>
                        </td>
                        <td>
                            <?php
                            $value = 'annotation';
            
                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            $this->widget('EJuiComboBox', array(
                                'name' => 'srch_annotation_autocomplete',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'srch_annotation_autocomplete', 'class'=>'outset', 'readonly'=>'readonly'),
                                'options' => array(
                                                'onSelect' => "$('#srch_annotation').val(item.value);", 
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
                    <?php echo CHtml::textArea('annotation','', array('id'=>'srch_annotation','style' => 'font-weight:bold','rows' => 5, 'cols' => 80)); ?>
                </div>                
            </td>
        </tr>
        <tr  >
            <td colspan="6">
                <?php
                /*


                 */
                $value = 'yaer_name_public';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();


                echo CHtml::label('Место и год издания:', 'srch_yaer_name_public'
                        , array('class' => 'inline_elem'));
                ?>                
                <?
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
			'htmlOptions'=>array('id'=>'srch_yaer_name_public'),
                ));

                echo $form->error($model, $value);
                ?>
            </td>
        </tr>
        <tr class="flong">
            <td width="50%" colspan="3">                
                <?php
                $value = 'number';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Инвентарный № :', 'srch_number',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_number', 'class' => 'inline_elem')
                ));

                echo $form->error($model, $value, array(), true);
                ?>                
            </td>
            <td colspan="3">
                <?php
                $value = 'language';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Язык экземпляра (документа):', 'srch_language',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_language','class' => 'inline_elem')
                ));

                echo $form->error($model, $value, array(), true);
                ?> 
                
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <?php
                $value = 'source';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Источник поступления:', 'srch_source',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_source','class' => 'inline_elem')
                ));

                echo $form->error($model, $value, array(), true);
                ?>  
            </td>
            <td colspan="3">
                 <?php
                $value = 'marks';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Отметки:', 'srch_marks',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id' => 'srch_marks','class' => 'inline_elem')
                ));

                echo $form->error($model, $value, array(), true);
                ?>
            </td>
        </tr>
        <tr  >
            <td colspan="6">
                <?php
                /*


                 */
                $value = 'signature';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();


                echo CHtml::label('Наличие автографа, дарственной подписи:', 'srch_signature'
                        , array('class' => 'inline_elem'));
                ?>                
                <?
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                        'htmlOptions'=>array('id'=>'srch_signature'),
                ));

                echo $form->error($model, $value);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
                $value = 'rack';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Стеллаж:', 'srch_rack',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_rack','class' => 'inline_elem')
                ));

                echo $form->error($model, $value, array(), true);
                ?>
            </td>
            <td colspan="2">
                <?php
                $value = 'locker';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Шкаф:', 'srch_locker',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_locker','class' => 'inline_elem')
                ));

                echo $form->error($model, $value, array(), true);
                ?>
            </td>
            <td colspan="2">
                <?php
                $value = 'board';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Полка:', 'srch_board',array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                    //'model' => $model,
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_board','class' => 'inline_elem')
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
                            <?php echo CHtml::label('Примечание: ', 'srch_info');?>
                        </td>
                        <td>
                            <?php
                            $value = 'info';
            
                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            $this->widget('EJuiComboBox', array(
                                'name' => 'srch_info_autocomplete',
                                'data' => $src,
				'htmlOptions'=>array('class'=>'outset', 'readonly'=>'readonly'),
                                'options' => array(
                                                'onSelect' => "$('#srch_info').val(item.value);", 
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
                    <?php echo CHtml::textArea('info','', array('id' => 'srch_info','style' => 'font-weight:bold','rows' => 5, 'cols' => 80)); ?>
                </div>                
            </td>
        </tr>
    </table>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
