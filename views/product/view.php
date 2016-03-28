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
<div class="product-view">
    <div class="row">

        <!-- left column -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- product Image and Zoom -->
            <div class="col-md-12">
                <?php
                    $images = $model->getImages();
                    $big = array_shift($images);
                ?>
                <div class="main-image sp-wrap col-md-7 no-padding">
                    <?php $src = $big ? $big->getUrl('original') : \app\models\Product::noImage();
                    echo Html::img($src, ['class' => 'img-responsive']) ?>
                </div>
                <div class="second-images col-md-5">
                    <?php foreach ($images as $image) {
                        echo Html::beginTag('div', ['class' => 'small-img']);
                        echo Html::img($image->getUrl('preview'), ['class' => 'img-responsive']);
                        echo Html::endTag('div');
                        echo Html::tag('br');
                    }?>
                </div>
            </div>
        </div><!--/ left column end -->


        <!-- right column -->
        <div class="col-lg-6 col-md-6 col-sm-5">

            <h1 class="product-title"><?= Html::encode($this->title) ?></h1>
            <div class="product-price">
                <?php if (!empty($model->price)) {?>
                    <span class="price-standard">
                        <b class="text-blue">Розничная цена:</b> <?= number_format(Html::encode($model->price), 0, '', ' ') ?> р.
                    </span>
                <?php echo Html::tag('span', FA::icon('question-circle'), [
                            'title'=>'Для уточнения оптовой цены свяжитесь с нами по телефону ' . Yii::$app->params['sitePhone'],
                            'data-toggle'=>'tooltip',
                            'style' => 'border-bottom: 1px dashed #025377; 506E86: pointer; color: #506E86'
                        ]);
                } ?><br/>
            </div>

            <div class="details-description">
                <p><?= Html::encode($model->description) ?></p>
            </div>
            <div class="properties sp-wrap col-lg-12">
                <?php if (!empty($model->properties)) {?>
                    <br/>
                    <h3>Характеристики</h3>
                    <table class="table">
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
<?php $this->registerJs('
    $(function () {
        $("[data-toggle=\'tooltip\']").tooltip();
    });
');
?>