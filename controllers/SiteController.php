<?php

namespace app\controllers;

use app\models\Product;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\db\Query;
use yii\filters\VerbFilter;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_DEV ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionShowMessageForm()
    {
        $model = new ContactForm();
        return $this->renderPartial('contact_form', [
            'model' => $model,
        ]);
    }

    public function actionSubmitMessage()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
        }
        return $this->renderPartial('contact', [
            'model' => $model,
        ]);
    }

    public function actionSearch()
    {
        $products = [];

        $q = Yii::$app->request->get('q');
        if (!empty($q)) {
            $products = Product::find()
                ->where(['enabled', 1])
                ->where(['like', 'name', [$q]])
                ->all();
        }

        return $this->render('search', [
            'products' => $products,
            'query' => $q
        ]);
    }

    public function actionViewMode()
    {
        if ($mode = Yii::$app->request->post('mode')) {
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'mode',
                'value' => $mode,
            ]));
        }
    }
}
