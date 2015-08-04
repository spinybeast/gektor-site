<?php
use yii\helpers\Html;

/* @var $model app\models\Category */
?>

<div class="item col-md-3 col-sm-6 col-xs-12">
    <div class="inner">
    <div class="img text-center">
        <?= Html::a(Html::img($model->getThumbUploadUrl('image', 'preview')), ['view', 'id' => $model->id]) ?>
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