<?php

namespace backend\controllers;

use backend\models\DOCUMENTOSPAGO;
use backend\models\DbInsercion;
use yii\data\ActiveDataProvider;
use yii\db\Connection;
use backend\models\Parametrizacionbdd;
use backend\models\ParametrizacionDatosEnvio;
use backend\models\DatosXml;
use yii\data\SqlDataProvider;

class DocumentospagoController extends \yii\web\Controller {

    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => DOCUMENTOSPAGO::find(),
            'pagination' => array('pageSize' => 2),
        ]);


        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /*
     * action para enviar datos a otra DB
     */

    public function actionEjecutar() {
    $DatosXml = DatosXml::find()->all();
        foreach ($DatosXml as $Fila) {
             $miarray = array();
            foreach ($Fila as $campo => $valor) {             
                $campoResult = $this->CampoMapeo($campo);
                if ($campoResult !== 0) {
                $miarray[$campoResult] = $valor;
                  }
               
            }  
            $miarray['fijo'] = 'Valor';
             print_r($miarray);  die();
            $db1 = $this->ConexionNewDB();
            $db1->createCommand()->insert('Datos', $miarray)
                ->execute();
        }
//            die();
//            print_r($miarray);  die();
//                //     print_r($insercion);
//           
//            
//            
//                $TablaMapeo = ParametrizacionDatosEnvio::find()->where(['Campo' => $campo])->one();
//                if ($TablaMapeo) { 
//                    $miarray = array();
//                    foreach ($TablaMapeo as $campoM => $valor2) {
//                        if ($campo == $valor2) { 
//                           $miarray[$campoM] = $valor;
//                            
//                        } 
//                    }   print_r($miarray);  
//                            die();  
//                  //  $var=count($insercion);
//                 // echo $var;
//                                  
//                }
//            }
//            
//        
//        $DatosXml = new SqlDataProvider([
//            'sql' => 'SELECT * FROM DatosXml',
//        ]);
//        $FilaDatoXml = $DatosXml->getModels();
//        $count = $DatosXml->getCount();
//        for ($i = 0; $i <= ($count - 1); $i++) {
//            $ValorFila = $FilaDatoXml[$i];
//            print_r($ValorFila);
//            die();
//            foreach ($ValorFila as $NombreCampo => $valor) {
//           // print_r($NombreCampo.$valor);
//            $Insercion= new DbInsercion();
//            $Insercion->campo=$NombreCampo;
//            $Insercion->valor=$valor;          
//                $TablaMapeo = new SqlDataProvider([
//                    'sql' => 'SELECT Tabla FROM ParametrizacionDatosEnvio WHERE Campo=:Campo',
//                    'params' => [':Campo' => $NombreCampo],
//                ]);
//                $existeTablaMapeo = $TablaMapeo->getModels();
//                $numero = $TablaMapeo->getCount();
//                if ($numero !== 0) {
//                    foreach ($existeTablaMapeo[0] as $TablaBD => $TablaNewDB) {
//                        $ValorCampo = $valor;
//                        $Campo = $NombreCampo;
//                        $Tabla = $TablaNewDB;
//                        /*
//                         * metodo para la insercion
//                         */
//                        $db1 = $this->ConexionNewDB();
//                        $db1->createCommand()->insert($Tabla, [
//                            $Campo => $ValorCampo
//                        ])->execute();
//                        //  echo $Tabla.$Campo.$ValorCampo;
//                    }
//                } else {
//                    echo '';
//                }
//            }
//            foreach ($Insercion as $inser)
//            { echo($inser).('');
//              
//            }
//                }
//                  die();
    }
    

    private function ConexionNewDB() {

        $query = Parametrizacionbdd::find();
        $parametrizacionBB = $query->orderBy('BDD')
                ->all();

        foreach ($parametrizacionBB as $parametrizacionBB) {
            $StringBB = $parametrizacionBB->StringBDD;
            $username = $parametrizacionBB->UserBDD;
            $password = $parametrizacionBB->PasswordBDD;
        }
        $db1 = new Connection([
            'dsn' => $StringBB,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
        ]);
        return $db1;
    }
    private function CampoMapeo($campo) {
        $CampoMapeo = new SqlDataProvider([
            'sql' => 'SELECT Campo FROM ParametrizacionDatosEnvio WHERE Campo=:Campo',
            'params' => [':Campo' => $campo],
        ]);
        $numero = $CampoMapeo->getCount();
        if ($numero !== 0) {
            $result =$campo;
            return $result;
        }
        return 0;
    }

}
