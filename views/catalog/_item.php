<?php
use yii\helpers\Html;

?>

<?= Html::a($model->name, ['view', 'id' => $model->id]) ?>
<?php if (!empty($model->children)) { ?>
    <ul class="children" data-parent="<?= $model->id ?>">
        <?php foreach ($model->children as $child) { ?>
            <li><?= Html::a($child->name, ['view', 'id' => $child->id]) ?></li>
        <?php } ?>
    </ul>
<?php } ?>