<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link href="<?php echo yii::app()->baseUrl ?>/favicon.ico" rel="shortcut icon" />
        <?php
        $cs = yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        $cs->registerCssFile(yii::app()->baseUrl . '/css/styles.css', 'all');
        ?>	
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="mainmenu">
                    <?php
                    $this->widget('application.components.CustomMenu', array(
                        'items' => $this->menu,
                        'id' => 'main-menu',
                    ));
                    ?>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="left-part lineelement">
                <div class="logo-element"></div>
            </div>
            <div class="right-part lineelement right">
                <div class="jcarousel-wrapper">
                    <div class="jcarousel">
                        <ul>
                            <?php foreach (SliderImage::model()->findAll() as $image): ?>
                            <li><img width="580" height="180" src="<?php echo Yii::app()->params['SLIDER_IMAGE_LINK'].'/'.$image->id.'.'.$image->extension ?>"/></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <script>
                $('.jcarousel').jcarousel({
                    wrap: 'circular',
                }).jcarouselAutoscroll({
                    interval: 5000,
                    target: '+=1',
                    autostart: true
                });
            </script>
            <div class="clear"></div>
            <div class="mainbody">
                <?php echo $content; ?>
            </div>
            <div class="clear"></div>
            <div class="footer">
                <ul id="footer-menu">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/new">Новинки</a></li>
                    <li><a href="/payment">Оплата и доставка</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                    <div class="clear"></div>
                </ul>
            </div>
        </div>
    </body>
</html>
