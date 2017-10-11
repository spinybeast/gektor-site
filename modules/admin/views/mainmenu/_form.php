<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\StaticPage;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\MainMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\MainMenu::find()->all(), 'id', 'name'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Начните вводить пункт меню'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'staticpage_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(StaticPage::find()->all(), 'id', 'title'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Начните вводить название страницы'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Начните вводить категорию'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'url')->textInput() ?>

    <?= $form->field($model, 'without_url')->checkbox() ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
