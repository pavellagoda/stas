<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link href="<?php echo yii::app()->baseUrl ?>/favicon.ico" rel="shortcut icon" />
        <?php
            $cs = yii::app()->clientScript;
            $cs->registerCoreScript('jquery');
            $cs->registerScriptFile(yii::app()->baseUrl . '/js/script.js', CClientScript::POS_HEAD);
            $cs->registerCssFile(yii::app()->baseUrl . '/css/styles.css', 'all');
        ?>	
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="mainmenu">

                </div>
            </div>
            <div class="mainbody">
                <?php  echo $content; ?>
            </div>
            <div class="footer">
                
            </div>
        </div>
    </body>
</html>
