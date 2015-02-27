<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use \yii\data\ArrayDataProvider;

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
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('_menu_item', ['model' => $model]);
            },
    ]); ?>

</div>
<div class="col-md-9 category-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (!empty($model->children)) { ?>
        <?= ListView::widget([
            'dataProvider' => new ArrayDataProvider(['allModels' => $model->children]),
            'layout' => '{items}',
            'itemView' => function ($model, $key, $index, $widget) {
                    return Html::a($model->name, ['view', 'id' => $model->id]);
                },
        ]); ?>
    <?php } ?>
    <?php $products = $model->products();
    if (!empty($products)) { ?>
        <div class="well well-sm">
            <strong>Режим просмотра</strong>

            <div class="btn-group">
                <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"></span>Список</a>
                <a href="#" id="grid" class="btn btn-default btn-sm active"><span class="glyphicon glyphicon-th"></span>Плитка</a>
            </div>
        </div>
        <div id="products" class="row list-group">
            <?php foreach ($products as $product) { ?>
                <div class="item  col-xs-4 col-lg-4">
                    <div class="thumbnail">
                        <div class="post-img-content">
                            <?= Html::img($product->getThumbUploadUrl('image', 'preview')) ?>
                        </div>
                        <div class="caption" style="padding-bottom: 0">
                            <h4 class="group inner list-group-item-heading">
                                <?= $product->name ?></h4>

                            <p class="group inner list-group-item-text">
                                <?= $product->description ?></p>

                            <div class="row">
                                <div class="col-xs-12 col-md-6 text-left">
                                    <p class="lead">
                                        <?= $product->price ?> р.</p>
                                </div>
                                <div class="col-xs-12 col-md-6 text-right">
                                    <a class="btn btn-greyblue" href="<?= Url::to(['product/view', 'id' => $product->id])?>">Посмотреть</a>
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
<?php $this->registerJs(
    "$(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('.active').removeClass('active');$(this).addClass('active');$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('.active').removeClass('active');$(this).addClass('active');$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        });"
);?>

