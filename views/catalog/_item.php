<?php
use yii\helpers\Html;

/* @var $model app\models\Category */
?>

<div class="item col-md-12 no-padding">
    <?php if ($even) {?>
    <div class="content col-md-6">
        <?php if (!empty($model->description)) { ?>
            <div class="description">
                <?= $model->description ?>
            </div>
        <?php } ?>
    </div>
    <div class="img text-right col-md-6 no-padding">
        <?= Html::a(Html::img($model->getUploadUrl('image'), ['class' => 'img-responsive']), ['view', 'id' => $model->id]) ?>
    </div>
    <?php } else { ?>
        <div class="img text-right col-md-6 no-padding">
            <?= Html::a(Html::img($model->getUploadUrl('image'), ['class' => 'img-responsive']), ['view', 'id' => $model->id]) ?>
        </div>
        <div class="content col-md-6">
            <?php if (!empty($model->description)) { ?>
                <div class="description">
                    <?= $model->description ?>
                </div>
            <?php } ?>
        </div>
    <?php }?>
</div>
<div class="clear"></div>