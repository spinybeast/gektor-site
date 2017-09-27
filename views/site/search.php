<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic"
      rel="stylesheet" type="text/css" />
<div class="site-search container">
    <h1>Результаты поиска по запросу&nbsp;&laquo;<?= $query ?>&raquo;</h1>
    <?php if (!empty($products)) {
        echo $this->render('/catalog/_products', ['products' => $products]);
     } else { ?>
        <h4>Ничего не найдено.</h4>
        Попробуйте изменить ваш запрос или воспользуйтесь нашим <a href="<?= Url::to(['/catalog']) ?>">каталогом оборудования</a>.
    <?php } ?>
</div>
