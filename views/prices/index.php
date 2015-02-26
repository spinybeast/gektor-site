<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Цены';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prices">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (!empty($categories)) { ?>
        <?php foreach ($categories as $category) { ?>
            <?php if (!empty($category->products)) { ?>
                <h3 class="beige text-center"><?= $category->name ?></h3>
                <table class="table table-responsive table-hover table-bordered">
                <tr>
                    <th class="text-center">Товар</th>
                    <th class="text-center">Цена</th>
                </tr>
                <?php foreach ($category->products as $product) { ?>
                    <tr>
                        <td class="col-md-8"><?= $product->name ?></td>
                        <td class="col-md-4"><?= $product->price ?></td>
                    </tr>
                <?php } ?>
                </table>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>
