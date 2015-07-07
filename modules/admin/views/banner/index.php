<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Баннеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать баннер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'position_id',
                'value' => function($data) { return $data->position_id ? $data->position->name : '<span class="not-set">(не задано)</span>'; },
                'format' => ['html']
            ],
            [
                'attribute' => 'page_id',
                'value' => function($data) { return $data->page ? $data->page->title : '<span class="not-set">(не задано)</span>'; },
                'format' => ['html']
            ],
            [
                'attribute' => 'image',
                'value' => function($data) { return $data->getThumbUploadUrl('image'); },
                'format' => ['image'],
            ],
            'enabled',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
