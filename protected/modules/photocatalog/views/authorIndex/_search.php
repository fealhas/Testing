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
            <td colspan="12" style="padding:0;padding-top:5px;">
                <?php
                $value = 'rubric';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();

                echo CHtml::label('Рубрика/подрубрика :', 'rubric',
                    array('class' => 'inline_elem'));
                $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'srch_rubric', 'class'=>'inset', 'tabindex'=>'1'),
                                ));

                echo $form->error($model, $value, array(), true);
                ?> 
            </td>
    </tr>
    <tr>
        <td  colspan="12">
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
                                            'htmlOptions'=>array('id'=>'srch_type_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
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
                            <?php echo CHtml::textArea('type','', array('id' => 'srch_type','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'2')); ?>
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
                                            'htmlOptions'=>array('id'=>'srch_text_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
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
                            <?php echo CHtml::textArea('text','', array('id' => 'srch_text','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'3')); ?>
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

                            echo CHtml::label('Примечание:', 'footnote',
                                array('class' => 'inline_elem'));
                            $this->widget('EJuiComboBox', array(
                                            'name' => 'Data_footnote_textarea',
                                            'data' => $src,
                                            'htmlOptions'=>array('id'=>'srch_footnote_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
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
                            <?php echo CHtml::textArea('footnote','', array('id' => 'srch_footnote','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'4')); ?>
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

                            echo CHtml::label('Фонд :', 'fund',
                                array('class' => 'inline_elem'));
                            $this->widget('EJuiComboBox', array(
                                            'name' => $value,
                                            'data' => $src,
                                            'htmlOptions'=>array('id'=>'srch_fund', 'class'=>'inset', 'tabindex'=>'5'),        
                                            ));

                            echo $form->error($model, $value, array(), true);
                            ?> 
                        </td>
                        <td colspan="3"  width='20%' style="padding:0;padding-top:5px;">
                            <?php
                                        $value = 'inventory';

                                        if (isset($dict[$value]))
                                            $src = $dict[$value];
                                        else
                                            $src = array();

                                        echo CHtml::label('Опись :', 'inventory', 
						array('class' => 'inline_elem'));
                                        
                                        $this->widget('EJuiComboBox', array(
                                            'name' => $value,
                                            'data' => $src,
                                	    'htmlOptions' => array('id'=>'srch_inventory','class' => 'inline_elem, inset', 'tabindex'=>'6')
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

                            echo CHtml::label('Дело :', 'case',
                                array('class' => 'inline_elem', 'style' => 'width: 150px;'));
                            $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                                'htmlOptions' => array('id'=>'srch_case','class' => 'inline_elem, inset', 'tabindex'=>'7')
                            ));

                            echo $form->error($model, $value, array(), true);
                            ?>  
                        </td>
                        <td colspan="3"  width='20%' style="padding:0;padding-top:5px;">
                            <?php
                            $value = 'tom';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();

                            echo CHtml::label("Том :", 'tom', array('class' => 'inline_elem'));
                            $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                                'htmlOptions' => array('id'=>'srch_tom','class' => 'inline_elem, inset', 'tabindex'=>'8'),
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
                                'name' => $value,
                                'data' => $src,
                                'htmlOptions' => array('id'=>'srch_sheet','class' => 'inline_elem, inset', 'tabindex'=>'9')
                            ));

                            echo $form->error($model, $value, array(), true);
                            ?>         
                        </td>
                         <td width="10%" padding="0" padding-top="5px">
                        <?php echo CHtml::label('Крайние даты:', 'dates', array('class' => 'inline_elem', 'style' => 'float:right')); ?>
                        </td>  
                         <td width="10%" padding="0" padding-top="5px">
                        <?php echo CHtml::label('&nbsp', 'year1', array('class' => 'inline_elem', 'style' => 'float:right')); ?>
                        </td>  
                        <td colspan="2"  width="20%" style="padding:0;padding-top:5px;">
                            <?php
                                $value = 'year1';

                                if (isset($dict[$value]))
                                    $src = $dict[$value];
                                else
                                    $src = array();

                        $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                                'htmlOptions' => array('id'=>'srch_year1','class' => 'inline_elem, inset', 'tabindex'=>'10', 'maxlength'=>'4', 'pattern'=>'[0-9]{4}','placeholder' => 'с')
                            ));

                            echo $form->error($model, $value, array(), true);
                            ?>  
                        </td>
                         <td width="10%" padding="0" padding-top="5px">
                        <?php echo CHtml::label('&nbsp', 'year2', array('class' => 'inline_elem', 'style' => 'float:right')); ?>
                        </td>  
                        <td colspan="2"  width='20%' style="padding:0;padding-top:5px;">
                            <?php
                                $value = 'year2';

                                if (isset($dict[$value]))
                                    $src = $dict[$value];
                                else
                                    $src = array();
                        $this->widget('EJuiComboBox', array(
                                'name' => $value,
                                'data' => $src,
                                'htmlOptions' => array('id'=>'srch_year2','class' => 'inline_elem, inset', 'tabindex'=>'11', 'maxlength'=>'4', 'pattern'=>'[0-9]{4}','placeholder' => 'по')
                            ));

                            echo $form->error($model, $value, array(), true);
                            ?>                
                        </td>
                    </tr>
                </table>
            </td>
    </tr>
</table>    

</div>
<?php
 $this->endWidget(); ?>

</div><!-- form -->
