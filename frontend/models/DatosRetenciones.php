<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "DatosRetenciones".
 *
 * @property integer $id
 * @property string $numeroAutorizacion
 * @property string $razonSocial
 * @property string $ruc
 * @property string $codDoc
 * @property string $estab
 * @property integer $ptoEmi
 * @property integer $secuencial
 * @property string $fechaEmision
 */
class DatosRetenciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DatosRetenciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numeroAutorizacion', 'razonSocial', 'ruc', 'codDoc', 'estab', 'ptoEmi', 'secuencial', 'fechaEmision'], 'required'],
            //[[ 'integer'],
            [['Estado'], 'string'],
            [['fechaEmision'], 'safe'],
            [['numeroAutorizacion'], 'string', 'max' => 40],
            [['razonSocial'], 'string', 'max' => 100],
            [['ruc'], 'string', 'max' => 13],
            [['codDoc'], 'string', 'max' => 2],
            [['estab'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numeroAutorizacion' => 'Numero Autorizacion',
            'razonSocial' => 'Razon Social',
            'ruc' => 'Ruc',
            'codDoc' => 'Cod Doc',
            'estab' => 'Estab',
            'ptoEmi' => 'Pto Emi',
            'secuencial' => 'Secuencial',
            'fechaEmision' => 'Fecha Emision',
            'Estado' => 'Enviado',   
        ];
    }
}
