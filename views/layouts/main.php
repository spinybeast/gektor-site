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
                <a class="logo text-left col-md-4 col-sm-12" href="<?= Url::home() ?>">
                    <?= Html::img('/img/logo2.png', array('alt' => Html::encode(Yii::$app->params['siteName']))) ?>
                    <?= Html::encode(Yii::$app->params['siteName']) ?>
                </a>

                <div class="slogan col-md-5 col-sm-12">
                    Газовое оборудование, водоснабжение, <br/>отопительное оборудование, насосы
                </div>
                <div class="text-right col-md-3 col-sm-12">
                    <div class="call">
                        <?= FA::icon('phone')->size(FA::SIZE_LARGE) ?>
                        <span class="text-blue"><?= Html::encode(Yii::$app->params['sitePhone']) ?></span>
                    </div>

                    <?=
                    Html::button(
                        FA::icon('question') . '&nbsp;&nbsp;Задать вопрос',
                        [
                            'class' => 'btn btn-info btn-lg btn-question',
                            'value' => Url::to(['site/show-message-form']),
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
                echo Html::beginTag('div', ['class' => 'pull-right topsearch']);
                echo Html::beginForm(['site/search'], 'get', ['class' => 'form-inline']);
                echo Html::textInput('q', null, ['placeholder' => 'Поиск по сайту', 'class' => 'form-control', 'id' => 'query']);
                echo Html::submitButton(FA::icon("search")->size(FA::SIZE_LARGE), ['class' => 'btn btn-small btn-info', 'id' => 'searchButton']);
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
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/site/index'], 'active' => false],
                    ['label' => 'Каталог оборудования', 'url' => ['/catalog'], 'active' => Yii::$app->controller->id == 'catalog' || Yii::$app->controller->id == 'product'],
                    ['label' => 'О компании', 'url' => ['/about'], 'active' => Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'about'],
                    ['label' => 'Контакты', 'url' => ['/contact'], 'active' => Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'contact'],
                ],
            ]);
            echo $this->blocks['search'];
            NavBar::end();
            ?>
        </div>
        <?php if (Yii::$app->controller->getRoute() == 'site/index') { ?>
            <div class="logos text-center">
                <div class="logos-carousel container">
                    <div><?= Html::img('/img/logos/Angara.jpg') ?></div>
                    <div><?= Html::img('/img/logos/atlantic-logo.jpg') ?></div>
                    <div><?= Html::img('/img/logos/DirectiveLVD.jpg') ?></div>
                    <div><?= Html::img('/img/logos/IMMERGAS.jpg') ?></div>
                    <div><?= Html::img('/img/logos/logo-navien.png') ?></div>
                    <div><?= Html::img('/img/logos/logo_danko1.jpg') ?></div>
                    <div><?= Html::img('/img/logos/Logo_etalon.png') ?></div>
                </div>
            </div>
        <?php } ?>
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
        <p class="text-center">&copy; <?= Yii::$app->params['siteName'] ?> 2011-<?= date('Y') ?>
            <span class="designed"><br/>designed by spiny.beast</span>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
