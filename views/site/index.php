<?php
use yii\bootstrap\Carousel;
use app\models\Banner;

/* @var $page app\models\StaticPage */
$this->title = !empty($page) ? $page->title : 'Главная';
?>
<style>
    .wrap .body{
        padding: 0;
    }
</style>
<div class="site-index">
    <div class="col-md-12 no-padding">
        <?=
        Carousel::widget([
            'items' => Banner::getSliderItems(),
            'controls' => false,
            'options' => [
                'interval' => 2000,
                'class' => 'slide',
            ]
        ]);?>
        <div class="about">
<!--           news-->
        </div>
    </div>

</div>
