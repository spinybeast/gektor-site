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
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->params['siteName'] . ' - ' . $this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="wrap">
    <header>
        <div class="headerdetails">
                <div class="col-md-12">
                    <div class=" col-md-3 col-sm-12">
                        <a class="logo text-left-md" href="<?= Url::home() ?>">
                            <?= Html::img('/img/logo.png', array('alt' => Html::encode(Yii::$app->params['siteName']), 'class' => 'img-responsive')) ?>
                        </a>
                    </div>
                    <div class="slogan col-md-7 col-sm-12 text-center">
                        <p>оптовые поставки газового и водонагревательного оборудования</p>
                    </div>
                    <div class="text-right col-md-2 col-sm-12">
                        <div class="call">
                            <span><?= Html::encode(Yii::$app->params['sitePhone']) ?></span><br/>
                            <span><?= Html::encode(Yii::$app->params['sitePhone2']) ?></span>
                        </div>

                        <?=
                        Html::button(
                            'Задать вопрос',
                            [
                                'class' => 'btn btn-lg btn-blue btn-question',
                                'value' => Url::to(['site/show-message-form']),
                                'id' => 'modalButton'
                            ]) ?>
                    </div>
                    <?php
                    Modal::begin([
                        'id' => 'modal',
                        'header' => 'Задать вопрос'
                    ]);
                    echo "<div id='modalContent'></div>";
                    Modal::end();
                    ?>
                </div>
            <div style="clear:both;"></div>
        </div>
        <div class="navbar-wrapper">
            <?php
            $this->beginBlock('search');
            echo Html::beginTag('div', ['class' => 'pull-right topsearch hidden-xs']);
            echo Html::beginForm(['site/search'], 'get', ['class' => 'form-inline']);
            echo Html::textInput('q', null, ['placeholder' => 'Поиск по сайту', 'class' => 'form-control', 'id' => 'query']);
            echo Html::submitButton(FA::icon("search")->size(FA::SIZE_LARGE), ['class' => 'btn btn-small btn-blue', 'id' => 'searchButton']);
            echo Html::endForm();
            echo Html::endTag('div');
            $this->endBlock();

            NavBar::begin([
                'brandLabel' => '',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-gektor',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'], 'encodeLabels' => false,
                'items' => MenuHelper::getMainMenu()
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
        <div class="text-center designed"><p>Данный информационный ресурс не является публичной офертой. Наличие и стоимость товаров уточняйте по телефону.
        Производители оставляют за собой право изменять технические характеристики и внешний вид товаров без
        предварительного уведомления.</p></div>
        <p class="text-center">&copy; <?= Yii::$app->params['siteName'] ?> 2011-<?= date('Y') ?>
            designed by spiny.beast
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
