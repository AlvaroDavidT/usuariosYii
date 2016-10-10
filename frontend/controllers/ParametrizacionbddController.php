<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Parametrizacionbdd;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

class ParametrizacionbddController extends Controller{
     /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BDD models.
     * @return mixed
     */
    public function actionIndex()
    {
          if (Yii::$app->user->isGuest) {
             return $this->render('login', [
                            'model' => $model,
                ]);
          }  else {
               $this->layout='archivosLayout';
        $dataProvider = new ActiveDataProvider([
            'query' => Parametrizacionbdd::find(),
            'pagination' => array('pageSize' => 2),
        ]);


        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
          }
             
    }
  
     public function actionCreate($submit = false) {
        
        $model = new Parametrizacionbdd();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->refresh();
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'message' => 'Guardado',
                ];
            } else {
                Yii::$app->response->format = Response::FORMAT_JSON;

                return ActiveForm::validate($model);
            }
        }
        return $this->renderAjax('create', [
                    'model' => $model,
        ]);
    }
    
    public function actionUpdate($id, $submit = false) {
       // 
   
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->refresh();
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'message' => '¡Éxito!',
                ];
            } else {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }
        return $this->renderAjax('update', [
                    'model' => $model,
        ]);
    }
    
     public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

     protected function findModel($id)
    {
        if (($model = Parametrizacionbdd::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
