<?php
use yii\helpers\Html;
use yii\bootstrap\Carousel;

/* @var $page app\models\StaticPage */
$this->title = !empty($page) ? $page->title : 'Главная'
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
                Html::img('/img/banners/IMG_6093.JPG'),
                Html::img('/img/banners/IMG_6094.JPG'),
                Html::img('/img/banners/IMG_6096.JPG'),
                Html::img('/img/banners/IMG_6100.JPG'),
            ],
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
