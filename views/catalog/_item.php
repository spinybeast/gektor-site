<?php
use yii\helpers\Html;
?>

<div class="item col-md-2">
    <?= Html::img($model->getThumbUploadUrl('image', 'preview'), ['class' => 'img-thumbnail'])?>
    <?= Html::a($model->name, ['view', 'id' => $model->id]) ?>
</div>