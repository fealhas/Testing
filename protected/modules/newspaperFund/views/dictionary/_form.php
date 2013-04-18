<div class="form">
	<?php
 $form=$this->beginWidget('CActiveForm', array(
		'id'=>'dictionary-form',
		'enableAjaxValidation'=>true,
	));
	?>
	<h1>Словарь &laquo;<span id='dict_name'></span>&raquo;</h1><br />
		<h2>Общий</h2>
	<div class="row" id='dict_toolbar'>
		<?php
			$base_path = $this->getModule()->baseScriptUrl;
			
			echo CHtml::imageButton("$base_path/img/icons/actions/save.png", array(
					'onClick'=>'saveDict(); return false;',
					));
			
		?>
		<?php
			echo CHtml::imageButton("$base_path/img/icons/actions/add_1.png", array(
							'onClick'=>'addWordInputShow(); return false;',
							));
		?>
		<?php
			echo CHtml::imageButton("$base_path/img/icons/actions/remove_1.png", array(
							'onClick'=>'removeWord(); return false;',
							));
		?>
	</div>
	

    <div class="row" id='values' style='width: 300px;'>
		<div id = "dict_vals" class='dict_div'>
		<?php
		/*
		 Выводим все значения данного словаря
		*/
			if (is_array($model->values)){
				foreach ($model->values as $value)
				{
					echo "<div class='dict_val'>$value</div>";
				}
			}
			
		?>
		</div>
		<div id='word_adder'>
		<?php
			echo CHtml::textField('new_word','Введите новое значение',
					      array('id'=>'new_word',
						    'class'=>'default_val_input',
						    'autocomplete'=>'off',
						    
			));
			
			echo CHtml::imageButton("$base_path/img/icons/actions/save_small_1.png", array(
				'onClick'=>'addWord_ok(); return false;',
				'class'=>'small_btn'
			));
						
			echo CHtml::imageButton("$base_path/img/icons/actions/remove_small_1.png", array(
				'onClick'=>'addWord_deny(); return false;',
				'class'=>'small_btn'
			));
		?>
		</div>
	</div>
	<h2>Локальный</h2>
<div class="row" id='dict_toolbar_loc'>
		<?php
			$base_path = $this->getModule()->baseScriptUrl;
			
			echo CHtml::imageButton("$base_path/img/icons/actions/save.png", array(
					'onClick'=>'saveDict("_loc"); return false;',
					));
			
		?>
		<?php
			echo CHtml::imageButton("$base_path/img/icons/actions/add_1.png", array(
							'onClick'=>'addWordInputShow("_loc"); return false;',
							));
		?>
		<?php
			echo CHtml::imageButton("$base_path/img/icons/actions/remove_1.png", array(
							'onClick'=>'removeWord("_loc"); return false;',
							));
		?>
	</div>
	<div class="row" id='values_loc' style='width: 300px;'>
		<div id = "dict_vals_loc" class='dict_div'>
		<?php
		/*
		 Выводим все значения данного словаря
		*/
		 echo "<div class='dict_val_loc'></div>";
		 $key_elem = $model->element;
		 if (!is_null($model)){
		 print("<SCRIPT>getDict('$key_elem');</SCRIPT>");
		}			
		?>
		</div>
		<div id='word_adder_loc'>
		<?php
			echo CHtml::textField('new_word_loc','Введите новое значение',
					      array('id'=>'new_word_loc',
						    'class'=>'default_val_input',
						    'autocomplete'=>'off',
						    
			));
			
			echo CHtml::imageButton("$base_path/img/icons/actions/save_small_1.png", array(
				'onClick'=>'addWord_ok("_loc"); return false;',
				'class'=>'small_btn'
			));
						
			echo CHtml::imageButton("$base_path/img/icons/actions/remove_small_1.png", array(
				'onClick'=>'addWord_deny("_loc"); return false;',
				'class'=>'small_btn'
			));
		?>
		</div>
		
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
