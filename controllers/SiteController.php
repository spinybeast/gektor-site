<?php

namespace app\controllers;

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
        /*$files = [];
        if ($handle = opendir(Yii::getAlias('@webroot/data'))) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    $files = array_merge($files, file(Yii::getAlias('@webroot/data/' . $file)));
                }
            }
            closedir($handle);
        }
        $fp = fopen(Yii::getAlias('@webroot/data/result.txt'), 'w+');
        $expression = array_unique($files);
        foreach ($expression as $id)
        fwrite($fp, $id);
        fclose($fp);
        die();*/
        $page = StaticPage::findOne(['pagekey' => StaticPage::MAIN_PAGEKEY, 'enabled' => 1]);
        return $this->render('index', [
            'page' => $page
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
