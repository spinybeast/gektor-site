<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="well">
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'category_id',
                'price',
                'trade_price',
                'name',
                'description:ntext',
                [
                    'attribute' => 'properties',
                    'value' => $model->rawProperties,
                    'format' => ['html'],
                ],
                [
                    'attribute' => 'image',
                    'value' => $model->getThumbUploadUrl('image'),
                    'format' => ['image'],
                ],
            ],
        ]) ?>
    </div>
</div>
