<?php
use yii\helpers\Html;
/* @var $model app\models\Category */
?>

<div class="item col-md-2">
    <?= Html::a(Html::img($model->getThumbUploadUrl('image', 'preview'), ['class' => 'img-thumbnail']), ['view', 'id' => $model->id])?>
    <?= Html::a($model->name, ['view', 'id' => $model->id]) ?>
    <?php if (!empty($model->description)) { ?>
        <div><?= Html::encode($model->description) ?></div>
    <?php } ?>
</div>