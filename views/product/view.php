<?php

use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
foreach ($model->category->breadCrumbs() as $crumb) {
    $this->params['breadcrumbs'][] = ['label' => $crumb->name, 'url' => ['catalog/view', 'id' => $crumb->id]];
}
$this->params['breadcrumbs'][] = ['label' => $model->category->name, 'url' => ['catalog/view', 'id' => $model->category->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic"
      rel="stylesheet" type="text/css"/>
<div class="product-view container">
    <div class="row">
        <!-- left column -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- product Image and Zoom -->
            <div class="col-md-12">
                <?php
                $images = $model->getImages();

                echo newerton\fancybox\FancyBox::widget([
                    'target' => 'a[rel=fancybox]',
                    'helpers' => true,
                    'mouse' => true,
                    'config' => [
                        'maxWidth' => '90%',
                        'maxHeight' => '90%',
                        'playSpeed' => 7000,
                        'padding' => 0,
                        'fitToView' => true,
                        'width' => '70%',
                        'height' => '70%',
                        'openEffect' => 'elastic',
                        'closeEffect' => 'elastic',
                        'prevEffect' => 'elastic',
                        'nextEffect' => 'elastic',
                        'closeBtn' => true,
                        'openOpacity' => true,
                    ]
                ]);
                $big = array_shift($images);
                $src = $big ? $big->getUrl('original') : \app\models\Product::noImage(); ?>
                <div class="main-image sp-wrap col-md-8 no-padding">
                    <?= Html::a(Html::img($src,['class' => 'img-responsive']), $src, ['rel' => 'fancybox']); ?>
                </div>
                <div class="second-images col-md-4">
                    <?php foreach ($images as $image) {
                        echo Html::a(Html::img($image->getUrl('preview'), ['class' => 'img-responsive']), $image->getUrl('original'), ['rel' => 'fancybox']);
                    } ?>
                </div>
            </div>
        </div><!--/ left column end -->

        <!-- right column -->
        <div class="col-lg-6 col-md-6 col-sm-5">

            <h4 class="product-title"><?= Html::encode($this->title) ?></h4>
            <div class="product-price">
                <?php if (!empty($model->price)) { ?>
                    <span class="price-standard">
                            <span
                                class="price">Розничная цена:</span> <b><?= number_format(Html::encode($model->price), 0, '', ',') ?>
                            <span class="lead">&#8399;</span></b>
                        </span>
                <?php } ?>
            </div>

            <div class="details-description">
                <p><?= Html::encode($model->description) ?></p>
            </div>
            <div class="properties sp-wrap col-lg-12 no-padding">
                <?php if (!empty($model->properties)) { ?>
                    <br/>
                    <table class="table properties">
                        <?php foreach ($model->properties as $property) { ?>
                            <tr>
                                <th><?= $property->name ?></th>
                                <td><?= $property->value ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
            </div>
        </div><!--/ right column end -->
    </div>
</div>
