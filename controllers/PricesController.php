<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use yii\web\Controller;

class PricesController extends Controller
{
    public function actionIndex()
    {
        $categories = Category::find()->all();

        return $this->render('index', [
            'categories' => $categories
        ]);
    }

}
