<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'price',
            'trade_price',
            [
                'header' => 'Категория',
                'value' => function($data) { return $data->category->name; },
                'format' => ['text'],
            ],
            'description:ntext',
            [
                'header' => 'Превью',
                'value' => function($data) { return $data->getThumbUploadUrl('image'); },
                'format' => ['image', ['width' => 100]],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
