<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MainMenu */

$this->title = 'Редактировать пункт меню: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Главное меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="main-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
