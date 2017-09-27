<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\MenuHelper;
use rmrevin\yii\fontawesome\FA;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?= Html::encode(Yii::$app->params['keywords']) ?>">
    <meta name="description" content="<?= Html::encode(Yii::$app->params['description']) ?>">
    <link rel="shortcut icon" href="<?= Url::to('/web/favicon.ico') ?>" type="image/x-icon"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->params['siteName'] . ' - ' . $this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<header>
    <div class="container">
        <div class="header-top row">
            <div class="logo col-md-3 text-left">
                <a href="<?= Url::home() ?>">
                    <?= Html::img('/img/gektorLogo.png', array('alt' => Html::encode(Yii::$app->params['siteName']), 'class' => 'img-responsive')) ?>
                </a>
            </div>
            <div class="title col-md-6 text-center">
                Оптовые поставки отопительного <br/> и водонагревательного оборудования <br/><span>SIRIUS</span>
            </div>
            <div class="phones col-md-3 text-right">
                <?php foreach (Yii::$app->params['sitePhones'] as $phone) { ?>
                    <p><?= Html::encode($phone) ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar-gektor',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'], 'encodeLabels' => false,
        'items' => MenuHelper::getMainMenu()
    ]); ?>
    <div class="search pull-right">
        <form class="form-inline" action="/search" method="get">
            <input type="text" id="query" class="form-control" name="q" placeholder="Поиск по сайту">
        </form>
    </div>
    <?php NavBar::end();
    ?>

</header>
<div class="wrap">
    <div class="container">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => 'Главная',
                'url' => Url::home(),
            ]
        ]) ?>
    </div>
    <?= $content ?>
</div>
<footer>
    <div class="line"></div>
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <ul>
                <?php foreach (MenuHelper::getMainMenu() as $item) {?>
                    <li><?= $item['label'] ?></li>
                <?php }?>
            </ul>
        </div>
        <div class="col-md-4">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A875317f9a2bd7d343ccf4b9229860e1f2c6c799bc013b6d5c640caa904bcae9b&amp;width=100%25&amp;height=250&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
        <div class="col-md-2">
            <p>Таганрог, биржевой спуск, 8</p>
            <p><a href="mailto:admin@gektor.ru">admin@gektor.ru</a></p>
            <p>+7 (8633) 111-290</p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
