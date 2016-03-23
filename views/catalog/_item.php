<?php
use yii\helpers\Html;

/* @var $model app\models\Category */
?>
<style>
    .wrap .body {
        padding: 0;
    }
</style>
<div class="item col-md-12 no-padding">
    <div class="inner">
    <div class="img text-center" style="width: 100%; max-height: 300px">
        <?= Html::a(Html::img($model->getUploadUrl('image'), ['class' => 'img-responsive']), ['view', 'id' => $model->id]) ?>
    </div>
    <div class="content">
        <div class="title">
            <?= Html::a($model->name, ['view', 'id' => $model->id]) ?>
        </div>
        <?php if (!empty($model->description)) { ?>
            <hr/>
            <div class="description">
                <?= Html::encode($model->description) ?>
            </div>
        <?php } ?>
    </div>
    </div>
</div>