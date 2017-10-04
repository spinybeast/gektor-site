<?php

use yii\helpers\Html;
use app\models\Banner;

/* @var $page app\models\StaticPage */
$this->title = 'Главная';
?>
<div class="site-index">
    <section>
        <div class="container">
            <div class="banner-carousel slide">
                <?php $banners = Banner::getSliderItems();
                foreach ($banners as $banner) {
                    echo Html::tag('div', $banner, ['class' => 'item']);
                }
                ?>
            </div>
            <?php if (!empty($news)) { ?>
                <div class="about">
                    <?php foreach ($news as $item) { ?>
                        <div class="col-md-6">
                            <?= Html::img($item->getUploadUrl('image'), ['class' => 'img-responsive']) ?>
                        </div>
                        <div class="col-md-6 news-text">
                            <p class="title"><?= $item->title ?></p>
                            <p class="date"><?= date('d.m.Y', strtotime($item->created_at)) ?></p>
                            <p><?= $item->text ?></p>
                        </div>
                    <?php } ?>

                    <div class="clear"></div>
                </div>
            <?php } ?>
        </div>
    </section>
    <div class="line"></div>
    <section>
        <div class="container">
            <div class="row features">
                <div class="col-md-4 text-right">
                    <ul>
                        <li>Доступная цена</li>
                        <li>Надежность</li>
                        <li>3 года гарантии</li>
                        <li>Автоматика "SIT"</li>
                        <li>Горелки "POLIDORO"</li>
                        <li>Взаимозаменяемость комплектующих</li>
                        <li>Срок службы - 15 лет</li>
                        <li>Широкая линейка продукции</li>
                        <li>КПД 92%</li>
                        <li>Энергонезависимость</li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <?= Html::img('/img/kot1.png', ['class' => 'img-responsive', 'style' => 'margin:0 auto']) ?>
                </div>
                <div class="col-md-4 text-left">
                    <ul>
                        <li>Водотрубный теплообменник</li>
                        <li>Компактный размер</li>
                        <li>Устойчивость теплообменника к прогару</li>
                        <li>Толщина стали теплообменника - 3 мм</li>
                        <li>Высокая скорость движения теплоносителя</li>
                        <li>Эфеективный отбор тепла</li>
                        <li>Рабочее давление - 2 АТМ</li>
                        <li>Возможность работы в закрытой системе</li>
                        <li>Взаимозаменяемость с АОГВ, КСГ, КЧМ и КЧГ</li>
                        <li>Теплообменник устойчив к коррозии</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="line"></div>
    <section>
        <div class="container">

            <div class="row">
                <div class="col-md-5">
                    <?= Html::img('/img/chuvak.png', ['class' => 'img-responsive']) ?>
                </div>
                <div class="col-md-7">
                    <h2 class="why-we">Почему мы</h2>
                    <?= $whyWe ? $whyWe->text : ''?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->registerJs('
    $(".banner-carousel").owlCarousel({
        items: 1,
        loop: true,
        animateOut: \'fadeOut\',
        autoplay: true,
        autoplayTimeout: 5000,
    });
'); ?>
