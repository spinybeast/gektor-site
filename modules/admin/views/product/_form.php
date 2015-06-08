<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use rmrevin\yii\fontawesome\FA;
use app\models\Category;
use app\models\ProductProperties;
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
            'widgetContainer' => 'dynamicform_wrapper',
            'widgetBody' => '.container-items',
            'widgetItem' => '.item',
            'min' => 0,
            'insertButton' => '.add-item',
            'deleteButton' => '.remove-item',
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
                    <button type="button" class="add-item btn btn-success btn-sm pull-right">
                        <?= FA::icon('plus') ?>
                    </button>
                </h4>
            </div>
            <div class="panel-body">
                <div class="container-items"><!-- widgetBody -->
                    <?php if (!empty($model->properties)){
                        $properties = $model->properties;
                    } else {
                        $properties = [new ProductProperties()];
                    } ?>
                    <?php foreach ($properties as $i => $property): ?>
                        <div class="item panel panel-default"><!-- widgetItem -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Характеристика <?= $i + 1 ?></h3>
                                <div class="pull-right">
                                    <button type="button" class="remove-item btn btn-danger btn-xs">
                                        <?= FA::icon('minus') ?>
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $property->isNewRecord) {
                                    echo Html::activeHiddenInput($property, "[{$i}]id");
                                }
                                ?>
                                <?= $form->field($property, "[{$i}]name")->textInput(['maxlength' => true]) ?>
                                <?= $form->field($property, "[{$i}]value")->textInput(['maxlength' => true]) ?>

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



