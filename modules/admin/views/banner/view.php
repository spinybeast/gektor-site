<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Баннеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'position_id',
                'value' => $model->position_id ? $model->position->name : '<span class="not-set">(не задано)</span>',
                'format' => ['html']
            ],
            [
                'attribute' => 'page_id',
                'value' => $model->page ? $model->page->title : '<span class="not-set">(не задано)</span>',
                'format' => ['html']
            ],
            [
                'attribute' => 'category_id',
                'value' => $model->category ? $model->category->name : '<span class="not-set">(не задано)</span>',
                'format' => ['html']
            ],
            [
                'attribute' => 'image',
                'value' => $model->getThumbUploadUrl('image'),
                'format' => ['image'],
            ],
            'enabled',
        ],
    ]) ?>

</div>
