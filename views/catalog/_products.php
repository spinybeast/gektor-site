<?php
use yii\helpers\Html;
/* @var $products \app\models\Product[] */
?>
<section class="products">
    <?php foreach ($products as $product) { ?>
        <div class="product-card">
            <div class="product-image">
                <?=
                Html::a(
                    Html::img($product->getImageUrl(), ['class' => 'img-responsive']),
                    ['product/view', 'id' => $product->id]
                ) ?>
            </div>
            <div class="product-info">
                <h4><?= Html::a($product->name, ['product/view', 'id' => $product->id]) ?></h4>
                <?php if (!empty($product->price)) { ?>
                    <h5>
                        <?= number_format(Html::encode($product->price), 0, '') ?>
                        <span class="lead">&#8399;</span>
                    </h5>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</section>