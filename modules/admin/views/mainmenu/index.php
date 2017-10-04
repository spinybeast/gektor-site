<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Главное меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пункт меню', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name:html',
            'staticpage_id',
            'category_id',
            'parent_id',
            'enabled',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
