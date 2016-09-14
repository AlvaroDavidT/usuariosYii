<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\SubirForm;
use common\models\LoginForm;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;// subir archivos

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
      //      'access' => [
     //           'class' => AccessControl::className(),
      //          'rules' => [
       //             [
      //                  'actions' => ['login', 'error'],
       //                 'allow' => true,
        //            ],
        //            [
        //                'actions' => ['logout', 'index'],
        //                'allow' => true,
         //               'roles' => ['@'],
          //          ],
        //        ],
       //     ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) ) {
            $model->login();
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    
  
    

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionSubir() 
    {
         // echo 'ver';
        
          if( Yii::$app->user->can('subirArchivos'))
         
         {
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
         }
          
        else
            {
            throw new ForbiddenHttpException;
       }
              
    }


}
