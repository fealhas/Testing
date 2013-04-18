<?php $this->pageTitle=Yii::app()->name; ?>
<?php
    $usr = Yii::app()->user;
    $isRoot = $usr->getIsSuperuser();
	$isExp = Yii::app()->user->checkAccess('explorer') && !(Yii::app()->user->getIsSuperuser());
		
?>

<h1><?=CHtml::image(Yii::app()->baseUrl.'/img/icons/dashboard.png')?> Рабочий стол</h1>

<div class="cb"></div>

<div class="bloc">
    <div class="title">
        Научно-справочный аппарат
    </div>
    <div class="content">
        <?php
            echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/main_icons/1.png', 'Систематический каталог').'Систематический   каталог', 
				array('/syscatalog'),
				array('class'=>'shortcut'
					));
			
            echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/main_icons/2.png', 'Именной указатель').'Именной указатель', 
                array('/author_index'),
                array('class'=>'shortcut',
                    ));
// отсюдова
            if ($isExp===false){
            echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/main_icons/3.png', 'ЗАГС').'ЗАГС', 
                array($_SERVER['REQUEST_URI'].'#'),
                array('class'=>'shortcut', 'id'=>'zags'
                    ));
             echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/main_icons/4.png', 'Рождение').'Рождение', 
                array('/zags_birth'),
                array('class'=>'shortcut', 'id'=>'birth', 'style'=>'display: none'
                    ));
             echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/main_icons/5.png', 'Смерть').'Смерть', 
                array('/zags_death'),
                array('class'=>'shortcut', 'id'=>'death', 'style'=>'display: none'
                    ));
             echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/main_icons/6.png', 'Бракосочетание').'Бракосочетание', 
                array('/zags_wedding'),
                array('class'=>'shortcut', 'id'=>'wedding', 'style'=>'display: none'
                    ));
			}
        ?>
        <SCRIPT>
           $("#zags").click(function(){
             if($("#birth").is(":hidden"))
                $('#birth').show(200);
             else
                $('#birth').hide(200);
             if($("#death").is(":hidden"))
                $('#death').show(200);
             else
                $('#death').hide(200);
             if($("#wedding").is(":hidden"))
                $('#wedding').show(200);
                else
                $('#wedding').hide(200);               
           });
        </SCRIPT>
        <?php
        if ($isRoot===true) ;
            // echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/icons/users.png', 'Редактор деревьев').'Редактор деревьев', 
            //         array('/SDynaTreeEditor'),
            //         array('class'=>'shortcut',
            //             'id'=>'docTreeEditorShortcut',
            // ));
            // array('label'=>'Пользователи', 'url'=>array('/user'), 'visible'=>$isRoot),
        ?>
        <div class="cb"></div>
    </div>
</div>

<div class="bloc">
    <div class="title">
        Справочно-информационный фонд
    </div>
    <div class="content">
<?php
    echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/main_icons/7.png', 'Библиотечный каталог').'Библиотечный каталог', array('/libcatalog'),array('class'=>'shortcut'));
    echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/main_icons/8.png', 'Газетный фонд').'Газетный фонд</br>', 
        array('/newspaperFund'),
        array('class'=>'shortcut',
            ))
?>
        <div class="cb"></div>
    </div>
</div>

<div class="cb"></div>

<div class="bloc left">
    <div class="title">
        Фото-&nbsp;Фоно-&nbsp;Видео-
    </div>
    <div class="content">
        <?php
            echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/main_icons/9.png', 'Каталог', array('style'=>'max-height: 48px; max-width:150px;')).'Каталог', 
                array('/photocatalog'),
                array('class'=>'shortcut', 'style'=>'width: 150px;',
                    ));
        ?>
        <div class="cb"></div>
    </div>
</div>

<div class="bloc right" id="zal">
    <div class="title">
        Читальный зал
    </div>
    <div class="content">
            <?php
				    echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/main_icons/10.png', 'Читальный зал').'Читальный зал', 
                    array('/zal'),
                    array('class'=>'shortcut',
                        ));
						
            ?>
        <div class="cb"></div>
    </div>
</div>
<?php
if ($isExp===true) echo "<script>
		       $('#zal').hide();
      </script>";
?>
