<?php
$base_path = $this->getModule()->baseScriptUrl; //path to module assets folder
?>
<div class='toolstrip'>

    <div class="row buttons">
        <?php
        echo CHtml::imageButton("$base_path/img/icons/actions/save.png", array(
            "onClick" => "saveRecord(); return false;",
            'class' => 'action_button',
            'title' => 'Сохранить',
        ));
        ?>
        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>
        <?php
        echo CHtml::imageButton("$base_path/img/icons/actions/refresh_1.png", array(
            "onClick" => "viewRecordById($model->id); return false;",
            'id' => 'refreshBtn',
            'title' => 'Обновить',
        ));
        ?>
        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>
        <!--<div class='divider'></div>-->

        <?php
        echo CHtml::imageButton("$base_path/img/icons/actions/left_end.png", array(
            "onClick" => "viewLastPrev(); return false;",
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
            "onClick" => "viewPrev(); return false;",
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
            "onClick" => "viewNext(); return false;",
            'class' => 'action_button',
            'title' => 'Перейти на следующую запись',
                //'class'=>'button'
        ));

        echo CHtml::imageButton("$base_path/img/icons/actions/right_end.png", array(
            "onClick" => "viewLastNext(); return false;",
            'class' => 'action_button',
            'title' => 'Перейти на последнюю запись',
                //'class'=>'button'
        ));
        ?>
        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>
        <?php
        echo CHtml::imageButton("$base_path/img/icons/actions/add_1.png", array(
            "onClick" => "getCreateRecordForm (); return false;",
            'class' => 'action_button',
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
            'class' => 'action_button',
            'title' => 'Удалить запись',
                //'class'=>'button'
        ));
        ?>

        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>

        <?php
        echo CHtml::imageButton("$base_path/img/icons/actions/clear.png", array(
            "onClick" => "clearForm('#auth_index_form'); return false;",
            'class' => 'action_button',
            'id' => 'clearBtn',
            'title' => 'Отчистить форму',
        ));
        ?>

        <div style="display:inline-block; height: 32px; border-left: 1px solid black;"></div>

        <div id='rec_info' style='display: inline-block; height: 35px;'>
            <span class='labeled_text'>Всего записей: <?= $model->getTotalCount(); ?></span><br/>
            <?php
            

            echo CHtml::label('Запись: ', 'curRec', array(
                'style' => 'display: inline;',
                'class'=>'labeled_text',
                'title' => 'Отчистить форму',
            ));

            echo CHtml::textField('test', $model->id, array(
                'size' => 4,
                'id' => 'curRec',
            ));

            echo CHtml::imageButton("$base_path/img/icons/actions/back_256x256.png", array(
                'onClick' => "viewRecordById($('#curRec').val()); return false;",
                'style' => 'position: absolute; margin-top: -5px;',
                'class' => 'action_button',
                'title'=>'Перейти к записи по номеру',                
            ));
            ?>
        </div>
    </div>
</div>