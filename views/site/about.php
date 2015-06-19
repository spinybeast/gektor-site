<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $page app\models\StaticPage */

$this->title = !empty($page) ? $page->title : 'О компании';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <?php if (!empty($page)) { ?>
        <h1><?= Html::encode($page->title) ?></h1>
        <?= Html::decode($page->text) ?>
    <?php } else { ?>
        <h1>Извините, страница не найдена.</h1>
    <?php } ?>
</div>
