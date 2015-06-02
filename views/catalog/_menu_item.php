<?php
use yii\helpers\Html;
/* @var $model app\models\Category */
?>

<?= Html::a($model->name, ['category/view', 'id' => $model->id]) ?>
<?php if (!empty($model->children)) { ?>
    <ul class="children" data-parent="<?= $model->id ?>">
        <?php foreach ($model->children as $child) { ?>
            <li><?= Html::a($child->name, ['category/view', 'id' => $child->id]) ?></li>
        <?php } ?>
    </ul>
<?php } ?>