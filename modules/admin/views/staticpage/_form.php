<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaticPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="static-page-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'pagekey')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 250]) ?>

    <?php echo yii\imperavi\Widget::widget([
        'model' => $model,
        'attribute' => 'text',
    ]); ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-2">
                <!-- Thumb 2 (preview profile) -->
                <?= Html::img($model->getThumbUploadUrl('background', 'preview'), ['class' => 'img-thumbnail']) ?>
            </div>
        </div>
    </div>
    <?= $form->field($model, 'background')->fileInput(['accept' => 'image/*']) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
