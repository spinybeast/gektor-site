<?php
use yii\helpers\Html;
use app\models\Banner;


/* @var $this yii\web\View */
/* @var $page app\models\StaticPage */

$this->title = !empty($page) ? $page->title : 'Ошибка 404';
$this->params['breadcrumbs'][] = $this->title;
$leftBanners = !empty($page) ? Banner::getLeftItems($page->pagekey) : [];
?>

<?php if (!empty($page)) { ?>
    <div style="width: 35%; position: absolute; right: 0; top: 0;z-index: 0">
        <?= Html::img($page->getUploadUrl('background'), ['class' => 'img-responsive']) ?>
    </div>
    <style>
        .body {background: #262626}
    </style>
<?php } ?>
<div class="col-md-12 page">
    <?php if (!empty($page)) { ?>

        <h1><?= Html::encode($page->title) ?></h1>
        <?= Html::decode($page->text) ?>
    <?php } else { ?>
        <h1>Извините, страница не найдена.</h1>
    <?php } ?>
</div>
