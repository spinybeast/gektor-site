<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $model app\models\Category */
?>

<div class="item col-md-12 no-padding">
    <?= Html::beginTag('a', ['class' => 'text', 'href' => Url::to(['view', 'id' => $model->id])]); ?>
    <?php if ($even) {?>
    <div class="content col-md-6">
        <?php if ($model->description) { ?>
            <div class="description">
                <?= $model->description ?>
            </div>
        <?php } ?>
    </div>
    <div class="img text-right col-md-6 no-padding">
        <?= Html::img($model->getUploadUrl('image'), ['class' => 'img-responsive']) ?>
    </div>
    <?php } else { ?>
        <div class="img text-right col-md-6 no-padding">
            <?= Html::img($model->getUploadUrl('image'), ['class' => 'img-responsive']) ?>
        </div>
        <div class="content col-md-6">
            <?php if ($model->description) { ?>
                <div class="description">
                    <?= $model->description ?>
                </div>
            <?php } ?>
        </div>
    <?php }
    echo Html::endTag('a');
    ?>
</div>
<div class="clear"></div>