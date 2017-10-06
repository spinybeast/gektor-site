<?php
use yii\helpers\Html;
use app\models\Banner;


/* @var $this yii\web\View */
/* @var $page app\models\StaticPage */

$this->title = !empty($page) ? $page->title : 'Ошибка 404';
$this->params['breadcrumbs'][] = $this->title;
$leftBanners = !empty($page) ? Banner::getLeftItems($page->pagekey) : [];
?>

<div class="container page">
    <div class="col-md-8">
    <?php if (!empty($page)) { ?>

        <h3><?= Html::encode($page->title) ?></h3>
        <?= Html::decode($page->text) ?>
    <?php } else { ?>
        <h1>Извините, страница не найдена.</h1>
    <?php } ?>
    </div>
</div>
