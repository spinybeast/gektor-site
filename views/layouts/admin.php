<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FA;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode(Yii::$app->params['siteName'] . ' - Админка') ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <!-- Navigation -->
        <?php NavBar::begin([
            'brandLabel' => Html::encode(Yii::$app->params['siteName']),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'encodeLabels' => false,
            'items' => [
                ['label' => 'Категории', 'url' => ['/admin/category/index']],
                ['label' => 'Товары', 'url' => ['/admin/product/index']],
                ['label' => FA::icon('sign-out') . ' Выход', 'url' => ['/admin/default/logout'], 'visible' => !Yii::$app->user->isGuest],
            ],
        ]);
        NavBar::end();
        ?>
        <!-- Page Content -->
        <div class="container">
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
    </div>
    <!-- /.container -->
    <footer>
        <hr>
        <div class="container text-center">
            <div class="col-lg-12">
                <p>&copy; <?= Yii::$app->params['siteName'] ?> 2011-<?= date('Y') ?></p>
            </div>
        </div>
    </footer>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>