<?php
use yii\helpers\Html;
use yii\bootstrap\Carousel;
use app\models\Banner;
use app\models\StaticPage;

/* @var $page app\models\StaticPage */
$this->title = !empty($page) ? $page->title : 'Главная';
$leftBanners = Banner::getLeftItems(StaticPage::MAIN_PAGEKEY);

?>
<div class="site-index">
    <?php if (!empty($leftBanners)) {?>
        <div class="col-md-3 hidden-xs left-banners">
            <?php foreach ($leftBanners as $leftBanner) { ?>
                <div><?= $leftBanner ?></div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="<?= !empty($leftBanners) ? 'col-md-9' : 'col-md-12' ?>">
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
            <?php if (!empty($page)) { ?>
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Html::decode($page->text) ?>
            <?php } else { ?>
                <h1>Извините, страница не найдена.</h1>
            <?php } ?>
        </div>
    </div>

</div>
