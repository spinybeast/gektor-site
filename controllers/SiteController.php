<?php

namespace app\controllers;

use app\models\News;
use app\models\Product;
use app\models\StaticPage;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\db\Query;
use yii\filters\VerbFilter;
use app\models\ContactForm;

class SiteController extends Controller
{

    const WHY_WE_PAGE_ID = 11;

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

    public function actionStatic()
    {
        $pageKey = Yii::$app->getRequest()->getQueryParam('action');

        $page = StaticPage::findOne(['pagekey' => $pageKey, 'enabled' => 1]);
        $view = file_exists($this->viewPath . DIRECTORY_SEPARATOR . $pageKey . '.php') ? $pageKey : 'static';
        return $this->render($view, [
            'page' => $page
        ]);
    }

    public function actionIndex()
    {
        $news = News::find()->where(['enabled' => 1])->orderBy('created_at')->limit(3)->all();
        return $this->render('index', [
            'news' => $news,
            'whyWe' => StaticPage::findOne(self::WHY_WE_PAGE_ID)
        ]);
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

        return $this->renderPartial('contact_form', [
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
