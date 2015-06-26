<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="static-page-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать страницу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'pagekey',
            'title',
            [
                'attribute' => 'enabled',
                'value' => function($data) { return $data->enabled == 1 ? 'Да' : 'Нет'; },
                'format' => ['text'],
            ],
            'shortText:html',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
