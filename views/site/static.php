<?php
use yii\helpers\Html;
use app\models\Banner;


/* @var $this yii\web\View */
/* @var $page app\models\StaticPage */

$this->title = !empty($page) ? $page->title : 'Ошибка 404';
$this->params['breadcrumbs'][] = $this->title;
$leftBanners = !empty($page) ? Banner::getLeftItems($page->pagekey) : [];
?>

<?php if (!empty($leftBanners)) {?>
    <div class="col-md-3 hidden-xs left-banners">
        <?php foreach ($leftBanners as $leftBanner) { ?>
            <div><?= $leftBanner ?></div>
        <?php } ?>
    </div>
<?php } ?>
<div class="<?= !empty($leftBanners) ? 'col-md-9' : 'col-md-12' ?>">
    <?php if (!empty($page)) { ?>
        <h1><?= Html::encode($page->title) ?></h1>
        <?= Html::decode($page->text) ?>
    <?php } else { ?>
        <h1>Извините, страница не найдена.</h1>
    <?php } ?>
</div>
