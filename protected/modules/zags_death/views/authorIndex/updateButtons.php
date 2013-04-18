<?php
$base_path = $this->getModule()->baseScriptUrl; //path to module assets folder

$isEditor = Yii::app()->user->checkAccess('Zags_death.zags_death.Update');
// если юзер из тарского филиала, контроль отображения editor_buttons будет при переходе по дереву
$isFilal = Yii::app()->user->checkAccess('filial') && !(Yii::app()->user->getIsSuperuser());
echo "<script>
			//alert ('$isEditor');
		      $(document).ready(function() {
  		          if ('$isFilal') $('.editor_button').hide(); 
		      });
      </script>";
if ($isFilal) $isEditor=true;
//


?>
<div class='toolstrip'>

    <div class='row buttons' id='createToolbar' style='display: none;'>
        <?php
        if ($isEditor===true){
        echo CHtml::imageButton("$base_path/img/icons/actions/save.png", array(
                                    "onClick"=>"createRecord(); return false;",
                                    'class'=>'action_button editor_button'
		       ));
        }
        ?>
    </div>
    
    <div class="row buttons" id='updateToolbar'>
        <?php
        if ($isEditor===true){
            echo CHtml::imageButton("$base_path/img/icons/actions/save.png", array(
                "onClick" => "saveRecord(); return false;",
                'class' => 'action_button editor_button',
                'title' => 'Сохранить',
            ));
        
        ?>
        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>
       
       <?php
        }
        echo CHtml::imageButton("$base_path/img/icons/actions/refresh_1.png", array(
            "onClick" => "viewRecordById(); return false;",
            'id' => 'refreshBtn',
            'title' => 'Обновить',
	    'class' => 'action_button',
        ));
        ?>
        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>
        <!--<div class='divider'></div>-->

        <?php
        echo CHtml::imageButton("$base_path/img/icons/actions/left_end.png", array(
            "onClick" => "viewRec('first'); return false;",
            'class' => 'action_button',
            'title' => 'Перейти на первую запись',
                //'class'=>'button',
        ));

//        $disabledPrev = false;
//
//        if (!$model->getPrevId(null, $model->categ_id)) {
//            $disabledPrev = true;
//        }

        echo CHtml::imageButton("$base_path/img/icons/actions/left.png", array(
            //"disabled" => $disabledPrev,
            "onClick" => "viewRec('prev'); return false;",
            'class' => 'action_button',
            'title' => 'Перейти на предыдущую запись',
                //'class'=>'button',
        ));
        ?>

        <?php
//        $disabledNext = false;
//        if (!$model->getNextId(null, $model->categ_id)) {
//            $disabledNext = true;
//        }
        echo CHtml::imageButton("$base_path/img/icons/actions/right.png", array(
            //"disabled" => $disabledNext,
            "onClick" => "viewRec('next'); return false;",
            'class' => 'action_button',
            'title' => 'Перейти на следующую запись',
                //'class'=>'button'
        ));

        echo CHtml::imageButton("$base_path/img/icons/actions/right_end.png", array(
            "onClick" => "viewRec('last'); return false;",
            'class' => 'action_button',
            'title' => 'Перейти на последнюю запись',
                //'class'=>'button'
        ));
        ?>
        <?php
        if ($isEditor===true){
        ?>
        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>
        <?php
        echo CHtml::imageButton("$base_path/img/icons/actions/add_1.png", array(
            "onClick" => "getForm ('create'); return false;",
            'class' => 'action_button editor_button',
            'title' => 'Добавить запись',
        ));
    
        ?>

        <?php
//        if ($disabledNext && $disabledPrev)
//            $disableDel = true;
//        else
//            $disableDel = false;

        echo CHtml::imageButton("$base_path/img/icons/actions/remove_1.png", array(
           // "disabled" => $disableDel,
            "onClick" => "removeRecord(); return false;",
            'class' => 'action_button editor_button',
            'title' => 'Удалить запись',
                //'class'=>'button'
        ));
	}
        ?>
        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>
        
        <?php
            echo CHtml::imageButton("$base_path/img/icons/actions/attachment.png", array(
                        "onClick"=>"getAttachments(); return false;",
                        'class'=>'action_button',
                        'title' => 'Прикрепленные документы',
			'id' => 'attachButton',
            ));
        ?>

        
        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>

        <?php
        echo CHtml::imageButton("$base_path/img/icons/actions/clear.png", array(
            "onClick" => "clearForm('#auth_index_form'); return false;",
            'class' => 'action_button',
            'id' => 'clearBtn',
            'title' => 'Очистить форму',
        ));
        ?>
        
        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>
        <?php
            echo CHtml::imageButton("$base_path/img/icons/actions/goto.png", array(
                    //'onClick' => "viewRecordById($('#curRecInput').val()); return false;",
                    //'style' => 'position: absolute; margin-top: -5px;',
                    'class' => 'action_button',
                    'title'=>'Перейти к записи по номеру',
                    'id' => 'gotoRecByNumber'
                ));
        ?>
        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>
        <div id='rec_info' style='display: inline-block; height: 35px;'>
            
            <?php
            

            echo CHtml::label('Запись: ', 'curRec', array(
                'style' => 'display: inline;',
                'class'=>'labeled_text',
            ));

            /*echo CHtml::textField('test', $model->id, array(
                'size' => 6,
                'id' => 'curRecInput',
                'readonly' => true,
            ));*/
            echo Chtml::tag("span",array('style'=>"font-weight:700;",'id'=>'curRecLbl'),$model->id,true);

            
            ?>
            <br/>
            <span class='labeled_text'>Всего записей: <span id='cat_total'><?= $model->getTotalCount($model->categ_id) ?></span></span>
        </div>
    </div>
</div>
