<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use app\assets\AppAsset;

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
            'brandLabel' => '',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Категории', 'url' => ['/admin/category']],
                ['label' => 'Товары', 'url' => ['/admin/products']],
            ],
        ]);
        NavBar::end();
        ?>
        <!-- Page Content -->
        <div class="container">
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