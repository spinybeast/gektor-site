<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
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
                <a class="logo pull-left" href="<?= Url::home() ?>">
                    <?= Html::img('img/logo.png', array('alt' => Html::encode(Yii::$app->params['siteName']))) ?>
                    &nbsp;<?= Html::encode(Yii::$app->params['siteName']) ?>
                </a>

                <div class="pull-right text-right" style="margin-right: 20px;">
                    <div class="call">
                        <?= FA::icon('phone')->size(FA::SIZE_LARGE) ?>
                        <span class="beige"><?= Html::encode(Yii::$app->params['sitePhone']) ?></span>
                    </div>

                    <?=
                    Html::button(
                        FA::icon('question') . '&nbsp;&nbsp;Задать вопрос',
                        [
                            'class' => 'btn btn-light-yellow btn-lg btn-question',
                            'value' => Url::to(['show-message-form']),
                            'id' => 'modalButton'
                        ]) ?>
                </div>
                <?php
                Modal::begin([
                    'id' => 'modal',
                    'header' => 'Обратная связь'
                ]);
                echo "<div id='modalContent'></div>";
                Modal::end();
                ?>
            </div>
        </div>
        <div class="navbar-wrapper">
            <?php
            $this->beginBlock('search');

            echo '<div class="pull-right topsearch">
                    <form class="form-inline">
                        <input type="search" placeholder="Поиск по сайту" class="form-control">
                        <button class="btn btn-small btn-light-yellow">' . FA::icon("search")->size(FA::SIZE_LARGE) . '</button>
                    </form>
                </div>';

            $this->endBlock();
            NavBar::begin([
                'brandLabel' => '',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-gektor',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'Каталог оборудования', 'url' => ['/category/index']],
                    ['label' => 'Цены', 'url' => ['/prices']],
                    ['label' => 'О компании', 'url' => ['/site/about']],
                ],
            ]);
            echo $this->blocks['search'];
            NavBar::end();
            ?>
        </div>
    </header>
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

<footer class="footer">
    <div class="container">
        <p class="text-center">&copy; <?= Yii::$app->params['siteName'] ?> 2011-<?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
