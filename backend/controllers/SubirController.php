<?php

namespace backend\controllers;
use Yii;
use backend\models\SubirForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile; // subir archivos

/**
 * ParametrizacionController implements the CRUD actions for Parametrizacion model.
 */

class SubirController extends Controller {
    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Parametrizacion models.
     * @return mixed
     */
    public function actionSubir() {
        if (Yii::$app->user->can('subirArchivos')) {
            $model = new SubirForm;
            $msg = null;
            if ($model->load(Yii::$app->request->post())) {
                $model->file = UploadedFile::getInstances($model, 'file');
                if ($model->file && $model->validate()) {
                    foreach ($model->file as $file) {
                        $file->saveAs('Archivos/' . $file->baseName . '.' . $file->extension);
                        echo $file;
                        $msg = "<h1><strong class='label label-info'>Subida realizada con éxito</strong></h1>";
                    }
                }
            }
            return $this->render("subir", ["model" => $model, "msg" => $msg]);
        } else {
            throw new ForbiddenHttpException;
        }
    }
}
