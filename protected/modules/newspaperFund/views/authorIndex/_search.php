<?
$isExp = Yii::app()->user->checkAccess('explorer') && !(Yii::app()->user->getIsSuperuser());

echo "<script>
              $(document).ready(function() {
                  if ('$isExp') $('#reportBtn').hide();
                  if ('$isExp') $('#word').hide(); 
              });
      </script>";
?>
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
		echo CHtml::imageButton("$basePath/img/icons/actions/report.png", array(
			'onClick'=>'report(); return false;',
			'alt'=>'Отчет',
			'title'=>'Отчет',
                        'id'=>'reportBtn',
			'class'=>'action_button',
			));
		?>
	<?php
        echo CHtml::link(CHtml::image("$basePath/img/icons/actions/word.png", 'Опись'), 
                array('data/list'),
                array('target'=>'_blank',
		      'title' => 'Опись',
              	      'id' => 'word',
                      'onClick'=>'list(this);'
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
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_file_number','class' => 'inline_elem, inset', 'tabindex'=>'1')
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
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_date_year3','class' => 'inline_elem, inset', 'tabindex'=>'2')
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
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_historical_period','class' => 'inline_elem, inset', 'tabindex'=>'3')
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
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_masthead','class' => 'inline_elem, inset', 'tabindex'=>'4')
                ));

                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr> 
        <tr>          <tr> <td colspan="6" style="padding:0;padding-top:5px;"> 
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
                                'htmlOptions'=>array('id'=>'srch_publish_date_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#srch_publish_date').val(item.value);", 
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
                <?php echo CHtml::textArea('publish_date','', array('id' => 'srch_publish_date','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'5')); ?>
                </div>                
            </td>
        </tr>      
        <tr> <td colspan="6" style="padding:0;padding-top:5px;"> 
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
                                'htmlOptions'=>array('id'=>'srch_newspaper_number_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#srch_newspaper_number').val(item.value);", 
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
                <?php echo CHtml::textArea('newspaper_number','', array('id' => 'srch_newspaper_number','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'6')); ?>
                </div>                
            </td>
</tr>  
        <tr> <td colspan="6" style="padding:0;padding-top:5px;"> 
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
                                'htmlOptions'=>array('id'=>'srch_place_of_public_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#srch_place_of_public').val(item.value);", 
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
                <?php echo CHtml::textArea('place_of_public','', array('id' => 'srch_place_of_public','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'7')); ?>
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
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_newspaper_lang','class' => 'inline_elem, inset', 'tabindex'=>'8')
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
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_marks','class' => 'inline_elem, inset', 'tabindex'=>'9')
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
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_rack','class' => 'inline_elem, inset', 'tabindex'=>'10')
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
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_locker','class' => 'inline_elem, inset', 'tabindex'=>'11')
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
                    'name' => $value,
                    'data' => $src,
                    'htmlOptions' => array('id'=>'srch_shelf','class' => 'inline_elem, inset', 'tabindex'=>'12')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
        <tr> <td colspan="6" style="padding:0;padding-top:5px;"> 
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
                                'htmlOptions'=>array('id'=>'srch_footnote_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#srch_footnote').val(item.value);", 
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
                <?php echo CHtml::textArea('footnote','', array('id' => 'srch_footnote','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'13')); ?>
                </div>                
            </td>
</tr>
	</table>
</div>
<?php
 $this->endWidget(); ?>

</div><!-- form -->
