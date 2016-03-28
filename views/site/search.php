<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Поиск по запросу';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic"
      rel="stylesheet" type="text/css" />
<div class="site-search">
    <h1><?= Html::encode($this->title) ?>&nbsp;&laquo;<?= $query ?>&raquo;</h1>
    <?php if (!empty($products)) { ?>
        <?php foreach ($products as $product) { ?>
            <div class="item  col-xs-12 col-lg-2 col-md-3">
                <div class="item-content">
                    <div class="post-img-content">
                        <?=
                        Html::a(
                            Html::img($product->getImageUrl(), ['class' => 'img-responsive']),
                            ['product/view', 'id' => $product->id]
                        ) ?>
                    </div>
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading text-center">
                            <?= Html::a($product->name, ['product/view', 'id' => $product->id], ['class' => 'item-name']) ?></h4>

                        <div class="group inner list-group-item-text">
                            <?php if (!empty($product->properties)) {?>
                                <table class="table table-responsive table-properties">
                                    <?php foreach ($product->properties as $property) { ?>
                                        <tr>
                                            <th><?= Html::encode($property->name) ?></th>
                                        </tr>
                                        <tr>
                                            <td><?= Html::encode($property->value) ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            <?php } else { ?>
                                <?= Html::encode($product->shortDescription) ?>
                            <?php } ?>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-md-6 text-left">
                                <?php if (!empty($product->price)) { ?>
                                    <p class="price">
                                        <?= number_format(Html::encode($product->price), 0, '', ',') ?><span class="lead">&#8399;</span>
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="col-xs-6 col-md-6 text-right">
                                <a class="btn btn-sample"
                                   href="<?= Url::to(['product/view', 'id' => $product->id]) ?>">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <h4>Ничего не найдено.</h4>
        Попробуйте изменить ваш запрос или воспользуйтесь нашим <a href="<?= Url::to(['/catalog']) ?>">каталогом оборудования</a>.
    <?php } ?>
</div>
