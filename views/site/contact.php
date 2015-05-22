<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table ">
        <tbody>
        <tr>
            <td>Название компании</td>
            <td>ООО «Товары И Услуги»</td>
        </tr>
        <tr>
            <td>Телефон:</td>
            <td>8 (495) 12-34-567</td>
        </tr>
        <tr>
            <td>Факс:</td>
            <td>8 (495) 76-54-321</td>
        </tr>
        <tr>
            <td>Режим работы:</td>
            <td>Пн.-Пт. 9:00 - 23:00</td>
        </tr>
        <tr>
            <td>Адрес:</td>
            <td>109012, г. Москва, ул. Никольская, д. 4</td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td>info@example.com</td>
        </tr>
        </tbody>
    </table>

    <div id="exampleContactsMap">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2707.7642575109585!2d38.914686!3d47.2603129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40e15841ac11f1d9%3A0x8b76cb26913ce82f!2z0YPQuy4g0JzQvtGB0LrQsNGC0L7QstCwLCAyMSwg0KLQsNCz0LDQvdGA0L7Qsywg0KDQvtGB0YLQvtCy0YHQutCw0Y8g0L7QsdC7LiwgMzQ3OTI0!5e0!3m2!1sru!2sru!4v1432300465201"
            width="100%" height="500" frameborder="0" style="border:0"></iframe>
    </div>


</div>
