<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
foreach ($model->category->breadCrumbs() as $crumb) {
    $this->params['breadcrumbs'][] = ['label' => $crumb->name, 'url' => ['catalog/view', 'id' => $crumb->id]];
}
$this->params['breadcrumbs'][] = ['label' => $model->category->name, 'url' => ['catalog/view', 'id' => $model->category->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">
    <div class="row">

        <!-- left column -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- product Image and Zoom -->
            <div class="main-image sp-wrap col-lg-12 no-padding" style="display: inline-block;">
                <?= Html::img($model->getThumbUploadUrl('image')) ?>
            </div>
        </div><!--/ left column end -->


        <!-- right column -->
        <div class="col-lg-6 col-md-6 col-sm-5">

            <h1 class="product-title"><?= Html::encode($this->title) ?></h1>
            <h3 class="product-code">Product Code : <?= Html::encode($model->id) ?></h3>
            <div class="product-price">
                <span class="price-standard"><?= Html::encode($model->price) ?> р.</span>
            </div>

            <div class="details-description">
                <p><?= Html::encode($model->description) ?></p>
            </div>

       </div><!--/ right column end -->

    </div>

</div>
