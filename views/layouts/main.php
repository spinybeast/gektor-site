<?php
use yii\helpers\Url;
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
    <meta name="keywords" content="<?= Html::encode(Yii::$app->params['keywords']) ?>">
    <meta name="description" content="<?= Html::encode(Yii::$app->params['description']) ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->params['siteName'] . ' - ' . $this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <header>
            <div class="headerdetails">
        <div class="container">
            <a class="logo pull-left" href="<?= Url::to('') ?>">
                <?= Html::img('img/logo.png', array('alt' => Html::encode(Yii::$app->params['siteName']))) ?>
                <?= Html::encode(Yii::$app->params['siteName']) ?>
            </a>
            <div class="pull-right">
                <div class="call"><?= FA::icon('phone')->size(FA::SIZE_LARGE) ?> <span class="beige">+ 00 123 456 7890 </span></div>
                <ul class="pull-right">
                   <button class="btn btn-success"><?= FA::icon('envelope-o') ?> Напишите нам</button>
                </ul>
            </div>
            <!--Top Search -->
            <div class="pull-right topsearch">
                <form class="form-inline">
                    <input type="search" placeholder="Search Here" class="form-control">
                    <button data-original-title="Search" class="btn btn-small btn-default"> <?= FA::icon('search')->size(FA::SIZE_LARGE) ?> </button>
                </form>
            </div>
        </div>
    </div>
        <?php
            NavBar::begin([
                'brandLabel' => '',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-gektor',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'Каталог оборудования', 'url' => ['/site/catalog']],
                    ['label' => 'Цены', 'url' => ['/site/price']],
                    ['label' => 'О компании', 'url' => ['/site/about']],
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
