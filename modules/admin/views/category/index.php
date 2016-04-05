<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            [
                'attribute' => 'parent_id',
                'value' => function($data) { return $data->parent ? $data->parent->name : '<span class="not-set">(не задано)</span>'; },
                'format' => ['html']
            ],
            'enabled',
            'description:html',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
