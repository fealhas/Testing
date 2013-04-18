<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="description" content="">
        <meta name="author" content="ООО &laquo;Сибирская Студия Разработчиков&raquo; <contact@sibds.com>">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon"  type="image/ico"  sizes="64x64" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.png">
        
        <link rel="stylesheet" href="/css/960gs/grid.css" />

        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css?v=2">

        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jqueryui/jqueryui.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jwysiwyg/jquery.wysiwyg.old-school.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/zoombox/zoombox.css" />

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/modernizr-1.7.min.js"></script>
    </head>
    <body class="wood dark">
        <div id="container">
            
                <?php echo $content; ?>
            
        </div>

        <!-- jQuery AND jQueryUI -->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>-->
        <!--<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.min.js"%3E%3C/script%3E'))</script>-->
        <!-- TODO: Организация скриптов в стиле Yii -->
        <!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.min.js"></script>-->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery-ui.min.js"></script>        
        <!--<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>-->

        <!-- jWysiwyg - https://github.com/akzhan/jwysiwyg/ -->        
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jwysiwyg/jquery.wysiwyg.js"></script>
        
        
        <!-- Tooltipsy - http://tooltipsy.com/ -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/tooltipsy.min.js"></script>
        
        <!-- iPhone checkboxes - http://awardwinningfjords.com/2009/06/16/iphone-style-checkboxes.html -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/iphone-style-checkboxes.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/excanvas.js"></script>
        
        <!-- Load zoombox (lightbox effect) - http://www.grafikart.fr/zoombox -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/zoombox/zoombox.js"></script>        
        
        <!-- Charts - http://www.filamentgroup.com/lab/update_to_jquery_visualize_accessible_charts_with_html5_from_designing_with/ -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/visualize.jQuery.js"></script>
        
        <!-- Uniform - http://uniformjs.com/ -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.uniform.min.js"></script>
        
        
        <!-- Main Javascript that do the magic part (EDIT THIS ONE) -->        
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/splitter.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
        <!--[if lt IE 7 ]>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->

    </body>
</html>
