<?php

namespace backend\controllers;
use backend\models\DOCUMENTOSPAGO;
use yii\data\ActiveDataProvider;
use yii\db\Command;
use yii\db\Query;
use yii\db\Connection;
use backend\models\Parametrizacionbdd;

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
    public function  actionEjecutar()
    {
    //   $query = new Query;
// compose the query
//$query->select('*')
   // ->from('Parametrizacionbdd');
// build and execute the query
//$rows = $query->all();


// alternatively, you can create DB command and execute it
//$command = $query->createCommand();
// $command->sql returns the actual SQL
//$rows = $command->queryAll();

$db1 = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=documentos',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
]);
$prueba = $db1->createCommand('SELECT * FROM doct_unidad')
            ->queryAll();


$db1->createCommand()->insert('doct_unidad', [
     	'tipoIdentificacion'=>'1',
    'identificacion'=>'0503263303',
    'razonSocial' => 'Alvaro',
    'direccion'=>'Las casas',
    'telefono'=>'1245356'
])->execute();
    print_r($prueba);
    die();
        
        
    
        
    }
   
    

}
