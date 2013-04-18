
<?php $this->beginContent('//layouts/main'); ?>
<header>
    <div id="head">
        <div class="left">
            <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/icons/menu/inbox2.png', 'Рабочий стол'), array('/site/index'), array(
                'class'=>'button profile',
                'title'=>'Вернуться на Рабочий Стол',
            ))?> 
            <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/img/icons/top/huser.png', 'Профиль пользователя'), array('/user/profile'), array(
                'class'=>'button profile',
            ))?>            
            Приветствую,
            <?php echo CHtml::link(Yii::app()->user->name, array('/user/profile')) ; ?>
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
    
    <div id="content" class="wood nosidebar">
        <?php $this->renderPartial('webroot.themes.classic.views.layouts.notifications'); ?>
        <?php $this->renderPartial('webroot.themes.classic.views.layouts.gotoRec'); ?>
        <?php $this->renderPartial('webroot.themes.classic.views.layouts.loader'); ?>
        <?php echo $content; ?>
    </div>
    
</div>

<footer>

</footer>

<?php $this->endContent(); ?>
