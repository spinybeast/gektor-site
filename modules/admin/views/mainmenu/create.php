<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MainMenu */

$this->title = 'Создать пункт меню';
$this->params['breadcrumbs'][] = ['label' => 'Главное меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
