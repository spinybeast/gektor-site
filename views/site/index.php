<?php
use yii\helpers\Html;
use app\models\Banner;

/* @var $page app\models\StaticPage */
$this->title = 'Главная';
?>
<style>
    .wrap .body{
        padding: 0;
    }
</style>
<div class="site-index">
    <div class="col-md-12 no-padding">
        <div class="banner-carousel slide">
            <?php $banners = Banner::getSliderItems();
            foreach($banners as $banner) {
                echo Html::tag('div', $banner, ['class' => 'item']);
            }
            ?>
        </div>
        <div class="about">
<!--           news-->
        </div>
    </div>

</div>
<?php $this->registerJs('
    $(".banner-carousel").owlCarousel({
        items: 1,
        loop: true,
        animateOut: \'fadeOut\',
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true
    });
'); ?>
