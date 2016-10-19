<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\Archivos;
use frontend\models\DatosFacturas;
use frontend\models\DatosRetenciones;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\db\Connection;
use frontend\models\ParametrizacionDatosEnvio;
use frontend\models\Parametrizacionbdd;
use frontend\models\ParametrizacionEnvioRetenciones;

/**
 * ParametrizacionController implements the CRUD actions for Parametrizacion model.
 */

class SubidosController extends Controller {

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
    public function actionIndex() {
         if (Yii::$app->user->isGuest) {
              $this->goHome();
          }  else {
        $this->layout = 'archivosLayout';
        $dataProvider = new ActiveDataProvider([
            'query' => Archivos::find(),
            'pagination' => array('pageSize' => 5),
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }
    }
    /*
     * procesar archivos subidos y divide facturas y retenciones
     */
    public function actionProcesar() {
        $ConsultaPath = new SqlDataProvider([ //consultamos todos los documentos subidos
            'sql' => 'SELECT PathXml FROM Archivos WHERE Estado=:Estado',
            'params' => [':Estado' => "subidos"],
        ]);
        $result = $ConsultaPath->getModels();
        $count = $ConsultaPath->getCount();
        for ($i = 0; $i <= ($count - 1); $i++) {//bucle para determinar tipo de documento y leer xml correspondientes
            $Path = $result[$i];
            foreach ($Path as $rutaXml) {
                $Autorizacion = $this->getAutorizacion($rutaXml); //obtiene la autorizacion
              //verifica cdata
                $xml = $this->EliminarCDataXml($rutaXml);//Resultado de eliminacion
                $DocXml = $this->TipoDoc($xml);//verificamos tipo de doc 'Facturta' ó 'retenciones'
                $this->ProcesaArchivo($DocXml,$Autorizacion,$xml);               
            }
        }
        if ($count != 0) {
            $this->UpdateEstado();
            Yii::$app->session->setFlash('success', 'Datos Enviados');
        }
        Yii::$app->session->setFlash('Info', 'No archivos nuevos');
        $this->redirect(['index']);
    }
    
    public function ProcesaArchivo($DocXml, $Autorizacion, $xml) {
        switch ($DocXml) {
            case "factura":
                $this->leerFacturasXml($xml, $Autorizacion);
                break;
            case "comprobanteRetencion":
                $this->leerRetencionesXml($xml, $Autorizacion);
        }
    }

    public function EliminarCDataXml($rutaXml) {      
        $xmlString = file_get_contents($rutaXml); //me obtiene el contenido del xml
        if (strstr($xmlString, '<![CDATA[<?xml version="1.0" encoding="UTF-8"?>')) {
            $Deletefirst = str_ireplace('<![CDATA[<?xml version="1.0" encoding="UTF-8"?>', '', $xmlString);
            $DeleteFinal = str_replace(']]>', '', $Deletefirst);
            $ResultaT = simplexml_load_string($DeleteFinal);
            return $ResultaT;
        } else if (strstr($xmlString, '<![CDATA[')) {
            $Deletefirst = str_ireplace('<![CDATA[', '', $xmlString);       //Cambio de str_replace por str_ireplace para reemplazos insensibles a mayúsculas y minúsculas. 
            $DeleteFinal = str_replace(']]>', '', $Deletefirst);
            $ResultaT = simplexml_load_string($DeleteFinal);
            return $ResultaT;
        }
    }

    public function CambioFecha($fecha) {
        $var = $fecha;
        $date = str_replace('/', '-', $var);
        $conversion = date('Y-m-d', strtotime($date));
        return $conversion;
    }

    public function getAutorizacion($rutaXml) {
        $xml = simplexml_load_file($rutaXml, null, LIBXML_NOCDATA);
        $autorizacion = (string) $xml->numeroAutorizacion;
        return $autorizacion;
    }

    /*
     * metodo para ver resutados de archivos subidos facturas
     */

    public function actionFacturas() {
         if (Yii::$app->user->isGuest) {
              $this->goHome();
          }  else {
         $this->layout='archivosLayout';
         
        $dataProvider = new ActiveDataProvider([
            'query' => DatosFacturas::find(),
            'pagination' => array('pageSize' => 5,),
        ]);
           
        return $this->render('Facturas', [
                    'dataProvider' => $dataProvider
        ]);
    }
    }
      /*
     * metodo para ver resutados de archivos subidos retenciones
     */
    public function actionRetenciones() {
         if (Yii::$app->user->isGuest) {
              $this->goHome();
          }  else {
        $this->layout = 'archivosLayout';
         $mensaje = null;
        $dataProvider = new ActiveDataProvider([
            'query' => DatosRetenciones::find(),
            'pagination' => array('pageSize' => 5),
        ]);

        return $this->render('Retenciones', [
                    'dataProvider' => $dataProvider,
        'msg'=>$mensaje]);
    }}

    public function actionEnviaFacturas() {   
        $DatosFacturas = DatosFacturas::find()->where(['Estado' => 0])->all();
        foreach ($DatosFacturas as $Fila) {
            $flag = $Fila->IdDoc;
            $miarray = array();
            foreach ($Fila as $campo => $valor) {
                $campoResult = $this->CampoMapeoFacturas($campo);
                if ($campoResult !== 0) {
                    $miarray[$campoResult] = $valor;
                }
            }
            $query = ParametrizacionDatosEnvio::find();  // Completamos el array con datos fijos
            $resultFijos = $query->where(['Tipo' => 0])->all();
            foreach ($resultFijos as $resultFijos) {
                $miarray[$resultFijos->Campo] = $resultFijos->Valor;
            }
            $facturas="Facturas";
            $db1 = $this->ConexionNewDB($facturas); //Invocacion al metodo para conexion a nueva base de datos
            $tabla = $this->ConsultaTabla($facturas);
            $db1->createCommand()->insert($tabla, $miarray)
                    ->execute();
            $Datos = DatosFacturas::findOne($flag); //Actualizamos estado del registro
            $Datos->Estado = '1';
            $Datos->update();
        }
         Yii::$app->session->setFlash('success', 'Datos Enviados');
        $this->redirect(['facturas']);
    }
   public function actionEnviaRetenciones() {   
        $DatosRetenciones = DatosRetenciones::find()->where(['Estado' => 0])->all();
        foreach ($DatosRetenciones as $Fila) {
            $flag = $Fila->id;
            $miarray = array();
            foreach ($Fila as $campo => $valor) {
                $campoResult = $this->CampoMapeoRetenciones($campo);
                if ($campoResult !== 0) {
                    $miarray[$campoResult] = $valor;
                }
            }
            $query = ParametrizacionEnvioRetenciones::find();  // Completamos el array con datos fijos
            $resultFijos = $query->where(['Tipo' => 0])->all();
            foreach ($resultFijos as $resultFijos) {
                $miarray[$resultFijos->Campo] = $resultFijos->Valor;
            }
            $Retenciones="Retenciones";
            $db1 = $this->ConexionNewDB($Retenciones); //Invocacion al metodo para conexion a nueva base de datos
            $tabla = $this->ConsultaTabla($Retenciones);
            $db1->createCommand()->insert($tabla, $miarray)->execute();
            $Datos = DatosRetenciones::findOne($flag); //Actualizamos estado del registro
            $Datos->Estado = '1';
            $Datos->update();
        }
        Yii::$app->session->setFlash('success', 'Datos Enviados');
             
         $this->redirect(['retenciones']);
    }
    private function ConsultaTabla($tipoDoc) {
        $query = Parametrizacionbdd::find();
        $parametrizacionDb = $query->where(['TipoDocumento'=>$tipoDoc])->orderBy('BDD')
                ->all();
        foreach ($parametrizacionDb as $parametrizacionDb) {
            $Tabla = $parametrizacionDb->Tabla;
        }
        return $Tabla;
    }

    private function ConexionNewDB($tipoDoc) {
        $query = Parametrizacionbdd::find();
        $parametrizacionBB = $query->where(['TipoDocumento'=>$tipoDoc])->orderBy('BDD')
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

    private function CampoMapeoFacturas($campo) {
        $CampoMapeo = new SqlDataProvider([
            'sql' => 'SELECT Campo FROM ParametrizacionDatosEnvio WHERE Campo=:Campo',
            'params' => [':Campo' => $campo],
        ]);
        $numero = $CampoMapeo->getCount();
        if ($numero !== 0) {
            $result = $campo;
            return $result;
        }
        return 0;
    }
       private function CampoMapeoRetenciones($campo) {
        $CampoMapeo = new SqlDataProvider([
            'sql' => 'SELECT Campo FROM ParametrizacionEnvioRetenciones WHERE Campo=:Campo',
            'params' => [':Campo' => $campo],
        ]);
        $numero = $CampoMapeo->getCount();
        if ($numero !== 0) {
            $result = $campo;
            return $result;
        }
        return 0;
    }

    /**
     * metodo para actualizar estado de documentos leidos
     */
    private function UpdateEstado() {
        $ConsultaEstado = new SqlDataProvider([
            'sql' => 'SELECT id FROM Archivos WHERE Estado=:Estado',
            'params' => [':Estado' => "subidos"],
        ]);
        $result = $ConsultaEstado->getModels();
        $count = $ConsultaEstado->getCount();
        for ($i = 0; $i <= ($count - 1); $i++) {
            $id = $result[$i];
            foreach ($id as $idE) {
                $Archivo = Archivos::findOne($idE);
                $Archivo->Estado = "Procesado";
                $Archivo->update();
            }
        }
        $Archivo = Archivos::findOne($idE);
    }

    /*
     * metodo para verificar que tipo d doc; Factura ó retencion
     */
    private function TipoDoc($xml) {
        $verDoc = $xml->comprobante[0];
        foreach ($verDoc as $tag => $valor) {
            $resultado = $tag;
        }
        return $resultado;
    }

    private function leerFacturasXml($xml, $Autorizacion) {
        $datosXml = new DatosFacturas();
        $datosXml->AutorizacionNumero = (string) $Autorizacion; // Para indicar si se creo el registro DB envio
        $datosXml->RazonSocial = (string) $xml->comprobante->factura->infoTributaria->razonSocial;
        //  $datosXml->NombreComercial = (string) $xml->comprobante->factura->infoTributaria->nombreComercial;
        $datosXml->ruc = (string) $xml->comprobante->factura->infoTributaria->ruc;
        $datosXml->CodDocumento = (string) $xml->comprobante->factura->infoTributaria->codDoc;
        $datosXml->Establecimiento = (string) $xml->comprobante->factura->infoTributaria->estab;
        $datosXml->Secuencial = (string) $xml->comprobante->factura->infoTributaria->secuencial;
        $datosXml->PuntoEmision = (string) $xml->comprobante->factura->infoTributaria->ptoEmi;
        $datosXml->FechaEmision = $this->CambioFecha((string) $xml->comprobante->factura->infoFactura->fechaEmision);
        $datosXml->TotalSinImpuesto = (float) $xml->comprobante->factura->infoFactura->totalSinImpuestos;
        $datosXml->TotalDescuento = (float) $xml->comprobante->factura->infoFactura->totalDescuento;
        $datosXml->BaseImponible = (float) $xml->comprobante->factura->infoFactura->totalConImpuestos->totalImpuesto->baseImponible;
        $datosXml->Tarifa = (int) $xml->comprobante->factura->infoFactura->totalConImpuestos->totalImpuesto->codigoPorcentaje;
        $datosXml->Valor = (float) $xml->comprobante->factura->infoFactura->totalConImpuestos->totalImpuesto->valor;
        $datosXml->ImporteTotal = (float) $xml->comprobante->factura->infoFactura->importeTotal;
        $datosXml->Estado = 'subidos';
        if ($datosXml->validate()) {
            $datosXml->save();
        } else {
            throw new ForbiddenHttpException;
        }
    }

    private function leerRetencionesXml($xml, $Autorizacion) {
        $datosXml = new DatosRetenciones();
        $datosXml->numeroAutorizacion = (string) $Autorizacion; // Para indicar si se creo el registro DB envio
        $datosXml->razonSocial = (string) $xml->comprobante->comprobanteRetencion->infoTributaria->razonSocial;
        $datosXml->ruc = (string) $xml->comprobante->comprobanteRetencion->infoTributaria->ruc;
        $datosXml->codDoc = (string) $xml->comprobante->comprobanteRetencion->infoTributaria->codDoc;
        $datosXml->estab = (string) $xml->comprobante->comprobanteRetencion->infoTributaria->estab;
        $datosXml->ptoEmi = (string) $xml->comprobante->comprobanteRetencion->infoTributaria->ptoEmi;
        $datosXml->secuencial=(string) $xml->comprobante->comprobanteRetencion->infoTributaria->secuencial;
        $datosXml->fechaEmision = $this->CambioFecha((string) $xml->comprobante->comprobanteRetencion->infoCompRetencion->fechaEmision);
        $datosXml->Estado = 'subidos';
        //print_r($datosXml);
      //  die();
        if ($datosXml->validate()) {
            $datosXml->save();
        } else {
            throw new ForbiddenHttpException;
        }
    }

}
