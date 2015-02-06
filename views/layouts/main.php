<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->params['siteName'] . ' - ' . $this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <header>
        <div class="container">
            <a class="logo pull-left" href="index.html"><img title="Simplepx" alt="Simplepx" src="img/logo.png"></a>
            <!--Social -->
            <div class="socialtop pull-right">
                <div class="call"><?= FA::icon('phone')->size(FA::SIZE_LARGE) ?> <span class="beige">+ 00 123 456 7890 </span></div>
                <ul class="pull-right">
                   <button class="btn btn-success"><?= FA::icon('envelope-o') ?> Напишите нам</button>
                </ul>
            </div>
            <!--Top Search -->
            <div class="pull-right topsearch">
                <form class="form-inline">
                    <input type="search" placeholder="Search Here" class="form-control">
                    <button data-original-title="Search" class="btn btn-orange btn-small tooltip-test"> <i class="icon-search icon-white"></i> </button>
                </form>
            </div>
        </div>

        <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->params['siteName'],
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-gektor',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'О нас', 'url' => ['/site/about']],
                    ['label' => 'Контакты', 'url' => ['/site/contact']]
                ],
            ]);
            NavBar::end();
        ?>
        </header>
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="text-center">&copy; <?= Yii::$app->params['siteName'] ?> 2011-<?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
