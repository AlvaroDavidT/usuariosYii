<?php

namespace frontend\controllers;
use Yii;
use frontend\models\SubirForm;
use yii\web\Controller;
use frontend\models\Archivos;
use yii\filters\VerbFilter;
use yii\web\UploadedFile; // subir archivos
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;
/**
 * ParametrizacionController implements the CRUD actions for Parametrizacion model.
 */

class SubirController extends Controller {
    /**
     * @inheritdoc
     * 
     * 
     * 
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
    public function actionSubirxml() {
        
         if (Yii::$app->user->isGuest) {
              $this->goHome();
          }  else {
        
        if (Yii::$app->user->can('subirArchivos')) {
            $this->layout='archivosLayout';
            $model = new SubirForm;
            $msg= null;
            if ($model->load(Yii::$app->request->post())) {
                $model->file = UploadedFile::getInstances($model, 'file');
                if ($model->file) {
                    foreach ($model->file as $file) {
                        $file->saveAs('Archivos/' . $file->baseName . '.' . $file->extension);
                        $pathUpload = Yii::getAlias('@app');
                        $ruta = ($pathUpload . '/web/Archivos/' . $file->baseName . '.' . $file->extension);
                        if (file_exists($ruta)) {
                            $xml = simplexml_load_file($ruta, null, LIBXML_NOCDATA);
                            $autorizacion = (string) $xml->numeroAutorizacion;
                            $fileUpload = ($pathUpload . "/web/Archivos/");
                            rename($ruta, $fileUpload . $autorizacion . ".xml");
                            $fileName = ($fileUpload . $autorizacion . ".xml");
                            $Resultado = new ActiveDataProvider(
                                    ['query' => Archivos::find()->where(['Autorizacion_Numero' => $autorizacion]),
                            ]);
                            $resul = $Resultado->getCount();
                            if ($resul == 0) {
                                $Archivos = new Archivos();
                                $Archivos->Autorizacion_Numero = $autorizacion;
                                $Archivos->PathXml = $fileName;  //Archivo Subido
                                $Archivos->Estado = "subidos";
                                if ($Archivos->validate()) {
                                    
                                    $Archivos->save();
                                } else {
                                    throw new ForbiddenHttpException;
                                }
                            }
                        } else {
                            throw new ForbiddenHttpException;
                        }
                    }
                }
            }
             Yii::$app->session->setFlash('success', $msg);
            return $this->render("index", ["model" => $model]);
        } else {
            
             $this->redirect(['/site/noaccess']);
        }
    }
    }

}
