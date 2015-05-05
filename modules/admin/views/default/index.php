<?php
use yii\widgets\Menu;
?>
<div class="admin-default-index">
    <h1>Добро пожаловать в админку!</h1>
    <p>
        Будьте как дома.
    </p>
    <?= Menu::widget([
        'items' => [
            ['label' => 'Категории', 'url' => ['/admin/category/index']],
            ['label' => 'Товары', 'url' => ['/admin/product/index']],
        ],
    ]);?>
</div>
