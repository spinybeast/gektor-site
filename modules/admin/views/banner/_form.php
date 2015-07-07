<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\BannerPosition;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'position_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(BannerPosition::findAll(), 'id', 'name'),
        'language' => 'ru',
    ]); ?>

    <?= $form->field($model, 'page_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\StaticPage::find()->all(), 'pagekey', 'title'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Начните вводить страницу'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-2">
                <!-- Thumb 2 (preview profile) -->
                <?= Html::img($model->getThumbUploadUrl('image', 'preview'), ['class' => 'img-thumbnail']) ?>
            </div>
        </div>
    </div>
    <?= $form->field($model, 'image')->fileInput(['accept' => 'image/*']) ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
