<?php
use rmrevin\yii\fontawesome\FontAwesome;
?>
<div class="admin-default-index">
    <div class="jumbotron">
        <div class="container">
            <h1>Добро пожаловать в админку!</h1>
            <p>Будьте как дома</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <h2>Категории <?= FontAwesome::icon('shopping-cart')?>  </h2>
            <p>Управление страницей "продукция" - баннеры, текст</p>
            <p><a class="btn btn-primary" href="/admin/category/index" role="button">Перейти »</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Товары <?= FontAwesome::icon('cart-plus')?></h2>
            <p>Управление информацией о товарах, фото продукции, характеристики</p>
            <p><a class="btn btn-primary" href="/admin/product/index" role="button">Перейти »</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Страницы <?= FontAwesome::icon('file-text-o')?></h2>
            <p>Управление страницами со статическим текстом (О компании, партнерам и т.д.)</p>
            <p><a class="btn btn-primary" href="/admin/staticpage/index" role="button">Перейти »</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <h2>Баннеры <?= FontAwesome::icon('picture-o')?></h2>
            <p>Управление Баннерами на главной, страницах категорий и т.д.</p>
            <p><a class="btn btn-primary" href="/admin/banner/index" role="button">Перейти »</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Новости <?= FontAwesome::icon('newspaper-o')?>  </h2>
            <p>Управление новостями сайта (для отображения на главной)</p>
            <p><a class="btn btn-primary" href="/admin/news/index" role="button">Перейти »</a></p>
        </div>
        <div class="col-lg-4">
            <h2>Главное меню <?= FontAwesome::icon('bars')?></h2>
            <p>Управление пунктами главного меню сайта</p>
            <p><a class="btn btn-primary" href="/admin/mainmenu/index" role="button">Перейти »</a></p>
        </div>
    </div>

</div>
