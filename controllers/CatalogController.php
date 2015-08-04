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

    /**
     * @return ActiveDataProvider
     */
    private static function getDataProvider()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()->where(['enabled' => 1, 'parent_id' => 0]),
        ]);
        return $dataProvider;
    }

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

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => self::getDataProvider(),
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if ($model->parent_id == 0) {
            $dataProvider = new ActiveDataProvider([
                'query' => Category::find()->where(['enabled' => 1, 'parent_id' => $id]),
            ]);
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->render('view', [
            'model' => $model,
            'mode' => $this->getViewMode()
        ]);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function getViewMode()
    {
        $cookies = Yii::$app->request->cookies;
        $mode = $cookies->getValue('mode', 'grid');
        return $mode;
    }
}
