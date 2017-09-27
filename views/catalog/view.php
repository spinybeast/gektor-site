<?php

use yii\helpers\Html;
use app\components\MenuHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукция', 'url' => ['/catalog']];
foreach ($model->breadCrumbs() as $crumb) {
    $this->params['breadcrumbs'][] = ['label' => $crumb->name, 'url' => ['view', 'id' => $crumb->id]];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view container">
    <div class="description">
        <?= ($banner = \app\models\Banner::getCatalogItem($model->id)) ? $banner->html : ''?>
    </div>
        <?php $menu = MenuHelper::getMenu($model->id);
        if (!empty($menu)) { ?>
            <div class="children">
                <?php foreach ($menu as $key => $item) { ?>
                    <span><?= Html::a($item['label'], $item['url'], ['class' => $key == 0 ? 'first' : '']) ?></span>
                <?php } ?>
            </div>
        <?php } ?>
    <?php if ($products = $model->products()) { ?>
        <?php /*<div class="well well-sm">
            <strong>Режим просмотра</strong>

            <div class="btn-group">
                <a href="#" id="list" class="btn btn-default btn-sm view-mode <?= $mode == 'list' ? 'active' : ''?>"><span class="glyphicon glyphicon-th-list"></span>Список</a>
                <a href="#" id="grid" class="btn btn-default btn-sm view-mode <?= $mode == 'grid' ? 'active' : ''?>"><span class="glyphicon glyphicon-th"></span>Плитка</a>
            </div>
        </div> */
        echo $this->render('/catalog/_products', ['products' => $products]);?>
    <?php } else { ?>
        <h4 class="text-default">Товаров пока нет</h4>
    <?php } ?>
</div>
<?php //$this->registerJs(
//    "$(document).ready(function() {
//        if($('#list').is('.active')){
//            setListMode();
//        } else {
//            setGridMode();
//        }
//        $('#list').click(function(event){event.preventDefault(); setListMode(); setViewMode('list')});
//        $('#grid').click(function(event){event.preventDefault(); setGridMode(); setViewMode('grid')});
//    });"
//);?>

