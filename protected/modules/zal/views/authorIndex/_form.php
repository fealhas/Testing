<div class="form" id='auth_index_form' style="position: absolute; left: 0; right: 0; bottom: 0; top: 40px;">

	<?php
	$admin = (Yii::app()->user->getIsSuperuser());

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
             <td  colspan="1" width='150px' padding='0' padding-top='5px'>
		<?php echo CHtml::label('№ личного дела :', 'case', array('class' => 'inline_elem')); ?>
		<br>
		<?php echo CHtml::link('Установить/сменить пароль', "", array(
					'style'=>'cursor: pointer; text-decoration: underline;',
					'onclick'=>"\$('#changePassword').dialog('open'); return false;", ));?>
	    </td> 
            <td colspan="1" width='12%'>
                <?php
                $value = 'case';

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
            <td width="40px">
            </td>
             <td width='150px' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Количество выданных ед.хр.:', 'funds', array('class' => 'inline_elem')); ?>
			</td>
            <td colspan="1" width='8%'>
                <?php
					$value = 'funds';

					if (isset($dict[$value]))
						$src = $dict[$value];
					else
						$src = array();
					$this->widget('EJuiComboBox', array(
						'model' => $model,
						'attribute' => $value,
						'data' => $src,
						'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'2', 'hidden')
					));

					echo $form->error($model, $value, array(), true);

                ?>        
			</td>
            <td width="80px">
						<?	$base_path = $this->getModule()->baseScriptUrl; //path to module assets folder
						echo CHtml::imageButton("$base_path/img/icons/actions/add_funds.png", array(
						"onClick" => "addFunds(); return false;",
						'id' => 'refreshBtnFunds',
						'title' => 'Добавить',
						'class' => 'action_button editor_button',
					)); ?>
						<?	$base_path = $this->getModule()->baseScriptUrl; //path to module assets folder
						if ($admin) {echo CHtml::imageButton("$base_path/img/icons/actions/del_funds.png", array(
						"onClick" => "cleanFunds(); return false;",
						'id' => 'editor_button ',
						'title' => 'Очистить количество выданных ед.хр. за год',
						'class' => 'action_button editor_button'						
					)); } ?>
            </td>
            <td width="40px" padding='0' padding-top='5px' text-align='right'>
		<?php 
			$base_path = $this->getModule()->baseScriptUrl;
            echo CHtml::imageButton("$base_path/img/icons/actions/log.png", array(
				"onClick" => "getLog(); return false;",
				'id' => 'refreshBtn',
				'title' => 'Просмотр книги учета посещений',
				'class' => 'action_button',
			));		
		?>
	    </td> 
             <td colspan="1" width="120px" padding='0' padding-top='5px' text-align='right'>
		<?php echo CHtml::label('Дата посещения :', 'visit_date', array('class' => 'inline_elem')); ?>
	    </td> 
            <td colspan="1" width='400px'>
                <?php
                /* echo $form->textField ($model, 'date_start', array(
                  'class'=>'inline_elem dateInput',
                  'size'=>30,
                  'id'=>'ai_date_start'
                  )); */
                ?>
                <?php //echo $form->error($model,'date_start'); ?>
                <?php
 		//$today = date("m/d/Y");  
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'visit_date',
                    'language' => 'ru',
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                        'dateFormat' => 'dd/mm/yy',
                        //'defaultDate' => '01/01/1500',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'constrainInput' => true,
                        'showOn' => "button",
                        'buttonImage' => "/img/input-datepicker.png",
                        'buttonImageOnly' => true
                    ),
                    'htmlOptions' => array(
                        //'class'=>'datepicker',
                        //'style' => 'height:20px;',
                        //'id'=>'ai_date_start',
                        'size' => 30,
                        'class' => 'inline_elem dateInput'
                    ),
                ));

		$base_path = $this->getModule()->baseScriptUrl; //path to module assets folder

	     echo CHtml::imageButton("$base_path/img/icons/actions/add_date.png", array(
            "onClick" => "addDate(); return false;",
            'id' => 'refreshBtn',
            'title' => 'Добавить дату',
	    'class' => 'action_button editor_button',
        ));
                ?>  
     <?	$base_path = $this->getModule()->baseScriptUrl; //path to module assets folder
						if ($admin) {echo CHtml::imageButton("$base_path/img/icons/actions/del_funds.png", array(
						"onClick" => "cleanLog(); return false;",
						'id' => 'editor_button',
						'title' => 'Очистить книгу учета',
						'class' => 'action_button editor_button'						
					)); } ?>
            </td>
	    <td colspan="1" width='50px'>
	    </td>		
	</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Время работы :', 'time', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="8">
                <?php
                $value = 'time';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'5')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Фамилия :', 'lastname', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="8">
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
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'6')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Имя и отчество :', 'first_second_name', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="8">
                <?php
                $value = 'first_second_name';

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
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Должность, ученая степень, звание :', 'dolzhn', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="8">
                <?php
                $value = 'dolzhn';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'8')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Кем командирован :', 'komandirovan', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="8">
                <?php
                $value = 'komandirovan';

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
	</tr>
       <tr class="flong">    
             <td  width='10%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Тема исследования (название, хронологические рамки) :', 'theme', array('class' => 'inline_elem')); ?>
	    </td>  
            <td colspan="8">
                <?php
                            $value = 'theme';

                            if (isset($dict[$value]))
                                $src = $dict[$value];
                            else
                                $src = array();
                            ?> 
                            <?
                            $this->widget('EJuiComboBox', array(
                                'name' => 'Data_theme_textarea',
                                'data' => $src,
                                'htmlOptions'=>array('id'=>'Data_theme_textarea', 'class'=>'outset', 'readonly'=>'readonly'),                                'options' => array(
                                                'onSelect' => "$('#Data_theme').val(item.value);", 
                                            ),
                                ));
                            echo $form->error($model, $value);
                            ?>
            </td>
        </tr>  
    <tr class="flong">
            <td colspan="9">
               
                <div >
                    <?php echo $form->textArea($model, 'theme', array('id'=>'Data_theme','style' => 'font-weight:bold','rows' => 5, 'cols' => 80, 'tabindex'=>'10')); ?>
                    <?php echo $form->error($model, 'theme'); ?>
                </div>                
            </td>
</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Цель занятия :', 'goal', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="8">
                <?php
                $value = 'goal';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
                $this->widget('EJuiComboBox', array(
                    'model' => $model,
                    'attribute' => $value,
                    'data' => $src,
                    'htmlOptions' => array('class' => 'inline_elem, inset', 'tabindex'=>'11')
                ));

                echo $form->error($model, $value, array(), true);
                ?>        
            </td>
	</tr>
        <tr class="flong"> 
             <td  width='13%' padding='0' padding-top='5px'>
		<?php echo CHtml::label('Место жительства :', 'place', array('class' => 'inline_elem')); ?>
	    </td> 
            <td  colspan="8">
                <?php
                $value = 'place';

                if (isset($dict[$value]))
                    $src = $dict[$value];
                else
                    $src = array();
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
</table>

<?php
 $this->endWidget(); ?>

</div><!-- form -->

<?php
$script = "
function setPswd()
{".
   CHtml::ajax(array(
            'url'=>array('//zal/default/setPassword'),
            'data'=> "js:{username: $('#Data_case').val(), password: $('#newPswd').val(), id:$('#curRec').val(), lastname: $('#Data_lastname').val(), firstname: $('#Data_first_second_name').val()}",
            'type'=>'post',
            'dataType'=>'html',
            'success'=>"function(data)
            {
				$('#changePassword').dialog('close');	
            } ",
            ))."
    return false; 
 
}";
Yii::app()->clientScript->registerScript('setPswd', $script, CClientScript::POS_END);

$script = "
function setPrfl()
{".
   CHtml::ajax(array(
            'url'=>array('//zal/default/setProfile'),
            'data'=> "js:{lastname: $('#Data_lastname').val()}",
            'type'=>'post',
			'dataType'=>'html',
            'success'=>"function(data)
            {
				if(data.indexOf('Ok')!=0){
					alert(data);
				}else{
					$('#changePassword').dialog('close');
				}				
            } ",
            ))."
    return false; 
}";
Yii::app()->clientScript->registerScript('setPrfl', $script, CClientScript::POS_END);

Yii::app()->clientScript->registerScript('changePassword', $script, CClientScript::POS_END);


$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'changePassword',
    'options'=>array(
        'title'=>'Установить/Сменить пароль',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>150,
		'buttons' => array
		(
			 'Установить'=>'js:function(){setPswd(); /*setPrfl();*/ return false;}',
			 'Отмена'=>'js:function(){$(this).dialog("close");}',
		),
    ),
));?>

<div id="changePassword">
	<label>Установить/Сменить пароль</label>
	<input type='text' id="newPswd">
</div>

<?php $this->endWidget();

$script = "
function postFU()
{".
   CHtml::ajax(array(
            'url'=>'http:\\\\10.2.55.15\\fu.php',
            'data'=> "js:{name: $('#Data_case').val()+' '+$('#Data_lastname').val()+' '+$('#Data_first_second_name').val().match(/[А-Я]/g).join('.')+'.', content: $('#descFU').val()}",
            'type'=>'post',
            'dataType'=>'html',
            'success'=>"function(data)
            {
				if(data.indexOf('Ok')!=0){
					alert(data);
				}else{
					$('#formFU').dialog('close');
				}				
            } ",
            ))."
    return false; 
 
}";

Yii::app()->clientScript->registerScript('postFU', $script, CClientScript::POS_END);

$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'formFU',
    'options'=>array(
        'title'=>'Заявка на выдачу фонда пользования',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>550,
		'open' => 'js: function(){$("#descFU").val(" Фонд: \n Опись: \n Дело: \n Том: \n  | ");}',
		'buttons' => array
		(
			 'Отправить'=>'js:function(){ postFU(); return false;}',
			 'Отмена'=>'js:function(){$(this).dialog("close");}',
		),
    ),
));?>

<div id="formFU">	
	<textarea id='descFU' cols="70" rows="26">
Фонд: 
Опись: 
Дело: 
Том: </textarea>
</div>

<?php $this->endWidget();?>
<?
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'logZal',
    'options'=>array(
        'title'=>'Книга учета посещений читального зала',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>550,
		'open' => 'js: function(){$("#logZalText").val("");}',
		'buttons' => array
		(
			 'Закрыть'=>'js:function(){$(this).dialog("close");}',
		),
    ),
));?>

<div id="logZal">	
	<textarea id='logZalText' cols="70" rows="26">
 	</textarea>
</div>

<?php $this->endWidget();?>
