<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Поиск по запросу';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-search">
    <h1><?= Html::encode($this->title) ?>&nbsp;&laquo;<?= $query ?>&raquo;</h1>
    <?php if (!empty($products)) { ?>
        <?php foreach($products as $product) { ?>
            <div class="item  col-xs-12 col-lg-3">
                <div class="thumbnail">
                    <div class="post-img-content">
                        <?=
                        Html::a(
                            Html::img($product->getThumbUploadUrl('image', 'preview'), ['class' => 'img-responsive']),
                            ['product/view', 'id' => $product->id]
                        ) ?>
                    </div>
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            <?= Html::a($product->name, ['product/view', 'id' => $product->id], ['class' => 'text-blue']) ?></h4>

                        <div class="group inner list-group-item-text">
                            <?php if (!empty($product->properties)) {?>
                                <table class="table table-responsive table-properties">
                                    <?php foreach ($product->properties as $property) { ?>
                                        <tr>
                                            <th><?= Html::encode($property->name) ?></th>
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
                                    <p class="lead">
                                        <?= $product->price ?> р.
                                    </p>
                                <?php } ?>
                            </div>
                            <div class="col-xs-6 col-md-6 text-right">
                                <a class="btn btn-info"
                                   href="<?= Url::to(['product/view', 'id' => $product->id]) ?>">Посмотреть</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <h4>Ничего не найдено</h4>
    <?php } ?>
</div>
