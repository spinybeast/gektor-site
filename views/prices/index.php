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
                <h3><?= $category->name ?></h3>
                <?php foreach ($category->products as $product) { ?>
                    <span><?= $product->name ?></span><?= $product->price ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>
