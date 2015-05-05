<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form well">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'trade_price')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <h4>Характеристики</h4>
    <hr/>
    <div class="properties">
        <?php if (!empty($model->properties)) {
            foreach ($model->properties as $property) {
                $id = 'property' . $property->id;
                echo Html::tag('p', Html::label($property->name, $id) . '  ' . Html::textInput($property->name, $property->value, ['id' => $id]));
            }
        } ?>
    </div>
    <?= Html::button(FA::icon('plus'), ['class' => 'btn btn-success', 'onclick' => 'createProperty()']) ?>
    <hr/>

    <div class="form-group">
        <div class="row">
            <div class="col-lg-2">
                <?= Html::img($model->getThumbUploadUrl('image', 'preview'), ['class' => 'img-thumbnail']) ?>
            </div>
        </div>
    </div>
    <?= $form->field($model, 'image')->fileInput(['accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function createProperty() {
        $('.properties').append('<input type="text"><br>');
    }
</script>
