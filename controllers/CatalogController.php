<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CatalogController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->redirect('/');
        return $this->render('index', [
            'dataProvider' => self::getDataProvider(),
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
            'mode' => $this->getViewMode()
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Товарная позиция не найдена');
    }

    protected function getViewMode()
    {
        $cookies = Yii::$app->request->cookies;
        return $cookies->getValue('mode', 'grid');
    }

    private static function getDataProvider()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()->where(['enabled' => 1, 'parent_id' => 0])->orderBy(['id' => 'desc']),
        ]);
        return $dataProvider;
    }
}
