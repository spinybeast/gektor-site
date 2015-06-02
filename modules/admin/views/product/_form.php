<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use rmrevin\yii\fontawesome\FA;
use app\models\Category;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form well">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Начните вводить категорию']
    ]); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'trade_price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="properties">
        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'min' => 0, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $model,
            'formId' => 'dynamic-form',
            'formFields' => [
                'name',
                'value',
            ],
        ]); ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>
                    <i class="glyphicon glyphicon-tags"></i> Характеристики
                    <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i></button>
                </h4>
            </div>
            <div class="panel-body">
                <div class="container-items"><!-- widgetBody -->
                    <?php foreach ($model->properties as $i => $modelAddress): ?>
                        <div class="item panel panel-default"><!-- widgetItem -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Характеристика <?= $i + 1 ?></h3>
                                <div class="pull-right">
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $modelAddress->isNewRecord) {
                                    echo Html::activeHiddenInput($modelAddress, "[{$i}]id");
                                }
                                ?>
                                <?= $form->field($modelAddress, "[{$i}]name")->textInput(['maxlength' => true]) ?>
                                <?= $form->field($modelAddress, "[{$i}]value")->textInput(['maxlength' => true]) ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php DynamicFormWidget::end(); ?>
    </div>

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



