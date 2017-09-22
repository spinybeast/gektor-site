<?php

use yii\helpers\Html;
use app\models\Banner;

/* @var $page app\models\StaticPage */
$this->title = 'Главная';
?>
<div class="site-index">
    <section>
        <div class="container">
            <div class="banner-carousel slide">
                <?php $banners = Banner::getSliderItems();
                foreach ($banners as $banner) {
                    echo Html::tag('div', $banner, ['class' => 'item']);
                }
                ?>
            </div>
            <?php if (!empty($news)) { ?>
                <div class="about">
                    <?php foreach ($news as $item) { ?>
                        <div class="col-md-6">
                            <?= Html::img($item->getUploadUrl('image'), ['class' => 'img-responsive']) ?>
                        </div>
                        <div class="col-md-6 news-text">
                            <p class="title"><?= $item->title ?></p>
                            <p class="date"><?= date('d.m.Y', strtotime($item->created_at)) ?></p>
                            <p><?= $item->text ?></p>
                        </div>
                    <?php } ?>

                    <div class="clear"></div>
                </div>
            <?php } ?>
        </div>
    </section>
    <div class="line"></div>
    <section>
        <div class="container">котёл</div>
    </section>
    <div class="line"></div>
    <section>
        <div class="container">почему мы</div>
    </section>
</div>
<?php $this->registerJs('
    $(".banner-carousel").owlCarousel({
        items: 1,
        loop: true,
        animateOut: \'fadeOut\',
        autoplay: true,
        autoplayTimeout: 5000,
    });
'); ?>
