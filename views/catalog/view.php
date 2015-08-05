<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use app\components\MenuHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог оборудования', 'url' => ['/catalog']];
foreach ($model->breadCrumbs() as $crumb) {
    $this->params['breadcrumbs'][] = ['label' => $crumb->name, 'url' => ['view', 'id' => $crumb->id]];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-3">
    <?=
    Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right navbar-gektor-right'],
        'items' => MenuHelper::getMenu()
    ]); ?>

</div>
<div class="col-md-9 category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="description">
        <?= Html::encode($model->description) ?>
    </div>

        <?php $menu = MenuHelper::getMenu($model->id);
        if (!empty($menu)) { ?>
            <div class="children">
                <?php foreach ($menu as $key => $item) { ?>
                    <span><?= Html::a($item['label'], $item['url'], ['class' => $key == 0 ? 'first' : '']) ?></span>
                <?php } ?>
            </div>
        <?php } ?>
    <br/>
    <?php $products = $model->products();
    if (!empty($products)) {
        ?>
<!--        <div class="well well-sm">-->
<!--            <strong>Режим просмотра</strong>-->
<!---->
<!--            <div class="btn-group">-->
<!--                <a href="#" id="list" class="btn btn-default btn-sm view-mode --><?//= $mode == 'list' ? 'active' : ''?><!--"><span class="glyphicon glyphicon-th-list"></span>Список</a>-->
<!--                <a href="#" id="grid" class="btn btn-default btn-sm view-mode --><?//= $mode == 'grid' ? 'active' : ''?><!--"><span class="glyphicon glyphicon-th"></span>Плитка</a>-->
<!--            </div>-->
<!--        </div>-->
        <div id="products" class="row list-group">
            <?php foreach ($products as $product) { ?>
                <div class="item  col-xs-12 col-lg-4">
                    <div class="thumbnail">
                        <div class="post-img-content">
                            <?=
                            Html::a(
                                Html::img($product->getThumbUploadUrl('image', 'preview'), ['class' => 'img-responsive']),
                                ['product/view', 'id' => $product->id]
                            ) ?>
                        </div>
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading text-center">
                                <?= Html::a($product->name, ['product/view', 'id' => $product->id], ['class' => 'text-blue']) ?></h4>

                            <div class="group inner list-group-item-text">
                                <?php if (!empty($product->properties)) {?>
                                    <table class="table table-responsive table-properties">
                                        <?php foreach ($product->properties as $property) { ?>
                                            <tr>
                                                <th><?= Html::encode($property->name) ?></th>
                                                <td><?= Html::encode($property->value) ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                <?php } else { ?>
                                    <?= Html::encode($product->shortDescription) ?>
                                <?php } ?>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-md-6 text-left">
                                    <?php if (!empty($product->price)) { ?>
                                        <p class="lead">
                                            <?= number_format(Html::encode($product->price), 0, '', ' ') ?> р.
                                        </p>
                                    <?php } ?>
                                </div>
                                <div class="col-xs-6 col-md-6 text-right">
                                    <a class="btn btn-sample"
                                       href="<?= Url::to(['product/view', 'id' => $product->id]) ?>">Посмотреть</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
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

