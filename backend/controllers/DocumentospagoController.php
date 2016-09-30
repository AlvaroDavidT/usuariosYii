<?php

namespace backend\controllers;

use backend\models\DOCUMENTOSPAGO;
use yii\data\ActiveDataProvider;
use yii\db\Connection;
use backend\models\Parametrizacionbdd;
use backend\models\ParametrizacionDatosEnvio;
use backend\models\DatosXml;

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
        $obtenerDatos = DatosXml::find()->all();

        foreach ($obtenerDatos as $obtenerDatos) {
            print_r($obtenerDatos);
        }
        die();

        foreach ($obtenerDatos as $obtenerDatos) {
            echo'';
        }


//$campos = array();
        $funcion = ParametrizacionDatosEnvio::getTablaDistinct();
        foreach ($funcion as $Tabla) {
            $nombreT = $Tabla->Tabla;
            /*
             * Hacer la consulta de campos para crear registo
             */
            $db1 = $this->ConexionNewDB();

            $consulCampos = ParametrizacionDatosEnvio::getCampos($nombreT);

            foreach ($consulCampos as $Campo) {
                $campod = $Campo->Campo;
                $campos[$i] = $campod;


                echo $i++;
            }
            die();
        }
        print_r($campo);

        $db1 = $this->ConexionNewDB();
        foreach ($funcion as $funcion) {
            $Tabla = $funcion->Tabla;
            $Campo = $funcion->Campo;

            $Regsitros = $db1->createComand('SELECT '
                            . $Campo
                            . ' FROM '
                            . $Tabla)->queryAll();
            $db1->createCommand()->insert($Tabla, [
                $Campo => '1245356'
            ])->execute();
        }


        //print_r($funcion);
        die();



        /* $doct_unidad = 'doct_unidad';
          $tipo = 'tipoIdentificacion';
          $identificacion = 'identificacion';
          $razonSocial = 'razonSocial';
          $direccion = 'direccion';
          $telefono = 'telefono';
          $db1->createCommand()->insert($doct_unidad, [
          $tipo => '1',
          $identificacion => '0503263303',
          $razonSocial => 'Alvaro',
          $direccion => 'Las casas',
          $telefono => '1245356'
          ])->execute();
          $prueba = $db1->createCommand('SELECT * FROM doct_unidad')
          ->queryAll();
          print_r($prueba);
          die(); */
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

}
