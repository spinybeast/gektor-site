<?php
use yii\helpers\Html;
use yii\bootstrap\Carousel;

/* @var $page app\models\StaticPage */
?>
<div class="site-index">
    <div class="col-md-3 hidden-xs left-banners">
        <div><?= Html::img('/img/banners/250x250adPlaceholder.png') ?></div>
        <div><?= Html::img('/img/banners/250x250adPlaceholder.png') ?></div>
    </div>
    <div class="col-md-9">
        <?=
        Carousel::widget([
            'items' => [
                Html::img('/img/banners/devochka-shary-pole-nastroenie.jpg'),
                Html::img('/img/banners/dom-mrachno-svet-lestnica.jpg'),
                Html::img('/img/banners/semya-more-zakat-siluety.jpg'),
            ],
            'controls' => false,
            'options' => [
                'interval' => 2000,
                'class' => 'slide',
            ]
        ]);?>
        <div class="about">
            <?php if (!empty($page)) { ?>
                <h1><?= Html::encode($page->title) ?></h1>
                <?= Html::decode($page->text) ?>
            <?php } else { ?>
                <h1>Извините, страница не найдена.</h1>
            <?php } ?>
        </div>
    </div>

</div>
