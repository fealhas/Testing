
<?php $this->beginContent('//layouts/main'); ?>
<header>
    <div id="head">
        <div class="left">
            <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/icons/top/huser.png', 'Профиль пользователя'), array('user/profile'), array(
                'class'=>'button profile',
            ))?>            
            Приветствую,                         
            <?php echo CHtml::link(Yii::app()->user->name, array('user/profile')) ; ?>
            |
            <?php echo CHtml::link('Выйти', array('/site/logout')); ?>

        </div>
        <div class="right">
            <form action="#" id="search" class="search placeholder">
                <label>Искать что нибудь?</label>
                <input type="text" value="" name="q" class="text"/>
                <input type="submit" value="rechercher" class="submit"/>
            </form>
        </div>
    </div>
</header>

<div id="main" role="main">

    <!--            
                SIDEBAR
    --> 
    <div id="sidebar" class="grye">
        <?php
        
        $usr = Yii::app()->user;
        //$isRoot = $usr->getIsSuperuser();
        $isSetAccess = $usr->checkAccess('SettingAccess');
        
        $this->widget('zii.widgets.CMenu', array(
            'activeCssClass'=>'current', 
            'encodeLabel'=>false,
            'htmlOptions'=>array(),
            'items' => array(
                array('label' => CHtml::image(Yii::app()->request->baseUrl.'/img/icons/menu/inbox.png', 'Рабочий стол').' Рабочий стол', 'url' => array('/site/index'), 'itemOptions'=>array('class'=>'nosubmenu')),
                array('label' => CHtml::image(Yii::app()->request->baseUrl.'/img/icons/menu/settings.png', 'Настройка').' Настройка', 'url' => array('/setting'), 'items'=>array(
                    array('label'=>'Администрирование', 'url'=>array('/site/admin'), 'visible'=>$isSetAccess),
                )),
                array('label' => CHtml::image(Yii::app()->request->baseUrl.'/img/icons/menu/idea.png', 'Справка').' Справка', 'url' => array('/help'), 'items'=>array(
                    array('label' => 'Справка', 'url' => array('/help/index'),),
                )),
                array('label' => CHtml::image(Yii::app()->request->baseUrl.'/img/icons/menu/info.png', 'О программе').' О программе', 'url' => array('/site/about'), 'itemOptions'=>array('class'=>'nosubmenu')),                
            ),
        ));
        ?>
        

    </div>
    
    <div id="content" class="wood">
        <?php echo $content; ?>
    </div>
    
</div>

<footer>

</footer>
<?php $this->endContent(); ?>

