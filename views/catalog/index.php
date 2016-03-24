<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукция';

?>
<style>
    .wrap .body {
        padding: 0;
        background: #262626;
    }
</style>
<div class="category-index">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_item', ['model' => $model, 'even' => ($index%2 == 0)]);
        },
    ]); ?>
</div>
