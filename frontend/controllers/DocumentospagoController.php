<?php

namespace backend\controllers;

use backend\models\DOCUMENTOSPAGO;
use yii\data\ActiveDataProvider;
use yii\db\Connection;
use backend\models\Parametrizacionbdd;
use backend\models\DatosXml;
use backend\models\ParametrizacionDatosEnvio;
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
    public function actionEjecutar() {
        /*
         * 
         */     //->where(['status' => Customer::STATUS_ACTIVE])
        $DatosXml = DatosXml::find()->where(['Estado'=>0])->all();
        foreach ($DatosXml as $Fila) {
            
             $flag=$Fila->IdDoc;
           
            /*
             * 
             */
            $miarray = array();
            foreach ($Fila as $campo => $valor) {
                $campoResult = $this->CampoMapeo($campo);
                if ($campoResult !== 0) {
                    $miarray[$campoResult] = $valor;
                }
            }
            /*
             * Completamos el array con datos fijos
             */
            $query = ParametrizacionDatosEnvio::find();
            $resultFijos = $query->where(['Tipo' => 0])->all();
            foreach ($resultFijos as $resultFijos) {
                $miarray[$resultFijos->Campo] = $resultFijos->Valor;
            }
             /*
             * Invocacion al metodo para conexion a nueva base de datos
             */
      
            $db1 = $this->ConexionNewDB();
            $db1->createCommand()->insert('Datos', $miarray)
                    ->execute();
            /*
             * Actualizamos estado del registro
             */
            $Datos = DatosXml::findOne($flag);
            $Datos->Estado = '1';
            $Datos->update();
        }
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
