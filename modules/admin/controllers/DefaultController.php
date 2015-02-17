<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
        ];
    }
//    public function beforeAction($action)
//    {
//        if (parent::beforeAction($action)) {
//
//            if (!Yii::$app->user->can($action->id)) {
//                throw new ForbiddenHttpException('Access denied');
//            }
//            return true;
//        } else {
//            return false;
//        }
//    }
}
