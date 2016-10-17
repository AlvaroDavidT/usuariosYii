<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "DatosXml".
 *
 * @property integer $IdDoc
 * @property string $CodDocumento
 * @property string $RazonSocial
 * @property string $ruc
 * @property string $NombreComercial
 * @property string $Establecimiento
 * @property string $PuntoEmision
 * @property string $Secuencial
 * @property string $FechaEmision
 * @property float $TotalSinImpuesto
 * @property float $TotalDescuento
 * @property float $BaseImponible
 * @property integer $Tarifa
 * @property float $Valor
 * @property float $ImporteTotal
 * @property string $AutorizacionNumero
 * @property string $Estado
 */
class DatosFacturas extends \yii\db\ActiveRecord
{
   //  public $Union;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DatosFacturas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CodDocumento', 'RazonSocial', 'ruc', 'Establecimiento','Secuencial','PuntoEmision', 'FechaEmision', 'TotalSinImpuesto', 'TotalDescuento', 'BaseImponible', 'Tarifa', 'Valor', 'ImporteTotal','AutorizacionNumero','Estado'], 'required'],
            [['Tarifa'], 'number'],
            [['Estado'], 'string'],
            [['FechaEmision'], 'safe'],
            [['TotalSinImpuesto', 'TotalDescuento', 'BaseImponible', 'Valor', 'ImporteTotal'], 'number'],
            [['CodDocumento'], 'string', 'max' => 2],
            [['RazonSocial', 'Establecimiento'], 'string', 'max' => 100],
           // [['NombreComercial'], 'string', 'max' => 200],
            [['AutorizacionNumero'],'string','max'=>50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdDoc' => 'Id Doc',
            'CodDocumento' => 'Cod Documento',
            'RazonSocial' => 'Razon Social',
            'ruc' => 'Ruc',
           // 'NombreComercial' => 'Nombre Comercial',
            'Establecimiento' => 'Establecimiento',
            'FechaEmision' => 'Fecha Emision',
            'TotalSinImpuesto' => 'Total Sin Impuesto',
            'TotalDescuento' => 'Total Descuento',
            'BaseImponible' => 'Base Imponible',
            'Tarifa' => 'Tarifa',
            'Valor' => 'Valor',
            'ImporteTotal' => 'Importe Total',
            'PuntoEmision' => 'Punto Emision',
            'Secuencial' => 'Secuencial',
            'AutorizacionNumero'=> 'Numero Aut.',
            'Estado' => 'Enviado',   
  
        ];
    }
   /* public static function getUnion()
        {
                return $this->Establecimiento . '-' . $this->PuntoEmision.'-'.$this->Secuencial;
        }*/
}
