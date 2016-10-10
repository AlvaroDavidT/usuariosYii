<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Archivos;
use backend\models\DatosXml;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use backend\models\Paramxml;

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
        $dataProvider = new ActiveDataProvider([
            'query' => Archivos::find(),
            'pagination' => array('pageSize' => 2),
        ]);


        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionProcesar() {
        $ConsultaPath = new SqlDataProvider([
            'sql' => 'SELECT PathXml FROM Archivos WHERE Estado=:Estado',
            'params' => [':Estado' => "subidos"],
        ]);
        $result = $ConsultaPath->getModels();
        $count = $ConsultaPath->getCount();
        for ($i = 0; $i <= ($count - 1); $i++) {
            $Path = $result[$i];
            foreach ($Path as $rutaXml) {
                $Autorizacion= $this->Autorizacion($rutaXml);//obtiene la autorizacion
                $xml = $this->leerXml($rutaXml);
                
            //    $this->GuardarInfoFactura();
               
                $datosXml = new DatosXml();
                $datosXml->AutorizacionNumero=(string) $Autorizacion;// Para indicar si se creo el registro DB envio
                $datosXml->RazonSocial = (string) $xml->comprobante->factura->infoTributaria->razonSocial;
                $datosXml->NombreComercial = (string) $xml->comprobante->factura->infoTributaria->nombreComercial;
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
                $datosXml->Estado=0; 
                if ($datosXml->validate()) {
                    $datosXml->save();
                } else {
                    throw new ForbiddenHttpException;
                }
            }
        }
       
        $this->UpdateEstado();
        $this->redirect(array('subidos/index'));
    }

    public function leerXml($rutaXml) {
        $xmlString = file_get_contents($rutaXml);
        $Deletefirst = str_replace('<![CDATA[<?xml version="1.0" encoding="UTF-8"?>', '', $xmlString);
        $DeleteFinal = str_replace(']]>', '', $Deletefirst);
        $ResutaT = simplexml_load_string($DeleteFinal);
        return $ResutaT;
    }

    public function CambioFecha($fecha) {
        $var = $fecha;
        $date = str_replace('/', '-', $var);
        $conversion = date('Y-m-d', strtotime($date));
        return $conversion;
    }
    public function Autorizacion($rutaXml)
    {
        $xml = simplexml_load_file($rutaXml, null, LIBXML_NOCDATA);
        $autorizacion = (string) $xml->numeroAutorizacion;
        return $autorizacion;
        
    }

    /*
     * metodo para ver resutados de archivos subidos
     */

    public function actionDatosxml() {
        $dataProvider = new ActiveDataProvider([
            'query' => DatosXml::find(),
            'pagination' => array('pageSize' => 2),
        ]);

        return $this->render('resultadoXml', [
                    'dataProvider' => $dataProvider,
        ]);
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
    private function GuardarInfoFactura() {
        $ConsultaParaFactura = new SqlDataProvider([
            'sql' => 'SELECT Tag_xml FROM Paramxml WHERE Estado=:Estado',
            'params' => [':Estado' => 1],
        ]);
        $result = $ConsultaParaFactura->getModels();
        print($result);
        die();
        
       foreach ($result as $result){
          //  $ver=$this->$Tags->codDoc;
       echo $result."<br>";
       } 
        
                die();
        
        for ($i = 0; $i <= ($count - 1); $i++) {
            $id = $result[$i];
            foreach ($id as $idE) {
                $datosXml = new DatosXml();
                $datosXml->RazonSocial = (string) $xml->comprobante->factura->infoTributaria->razonSocial;
                $datosXml->NombreComercial = (string) $xml->comprobante->factura->infoTributaria->nombreComercial;
                $datosXml->ruc = (string) $xml->comprobante->factura->infoTributaria->ruc;
                $datosXml->CodDocumento = (string) $xml->comprobante->factura->infoTributaria->codDoc;
                $datosXml->Establecimiento = (string) $xml->comprobante->factura->infoTributaria->estab;
                $datosXml->Secuencial = (string) $xml->comprobante->factura->infoTributaria->secuencial;
                $datosXml->PuntoEmision = (string) $xml->comprobante->factura->infoTributaria->ptoEmi;
                 if ($datosXml->validate()) {
                    $datosXml->save();
                } else {
                    throw new ForbiddenHttpException;
                }
            }
        }
    }

}
