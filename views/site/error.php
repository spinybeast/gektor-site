<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error text-center">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="text-disable">
        <?= nl2br(Html::encode($message)) ?>
    </div>
</div>
