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
    <link rel="shortcut icon" href="<?= Url::to('/web/favicon.ico') ?>" type="image/x-icon" />
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
                <?php }?>
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
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => 'Главная',
                'url' => Url::home(),
            ]
        ]) ?>
        <?= $content ?>
</div>
<footer>
    <div class="line"></div>
    <div class="col-md-3"></div>
    <div class="col-md-9">
        <div class="col-md-3">
            <ul>
                <li>Главная</li>
                <li>Продукция</li>
                <li>Где купить</li>
                <li>Партнерам</li>
                <li>Условия сотрудничества</li>
                <li>О компании</li>
                <li>Контакты</li>
            </ul>
        </div>
        <div class="col-md-6">
            КАРТА
        </div>
        <div class="col-md-3 text-l">
            <p>Таганрог, биржевой спуск, 666</p>
            <p>admin@gektor.ru</p>
            <p>+7 (8633) 111-290</p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
