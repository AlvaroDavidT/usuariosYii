<?php

namespace backend\controllers;
use backend\models\DOCUMENTOSPAGO;
use yii\data\ActiveDataProvider;

class DocumentospagoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DOCUMENTOSPAGO::find(),
            'pagination' => array('pageSize' => 2),
        ]);


        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }
   
    

}
