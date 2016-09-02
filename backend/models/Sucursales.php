<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sucursales".
 *
 * @property integer $sucursal_id
 * @property integer $companias_compania_id
 * @property string $sucursal_nombre
 * @property string $sucursal_direccion
 * @property string $sucursal_creado_fecha
 * @property string $sucursal_estado
 *
 * @property Departamentos[] $departamentos
 * @property Companias $companiasCompania
 */
class Sucursales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sucursales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companias_compania_id', 'sucursal_nombre', 'sucursal_direccion', 'sucursal_creado_fecha', 'sucursal_estado'], 'required'],
            [['companias_compania_id'], 'integer'],
            [['sucursal_creado_fecha'], 'safe'],
            [['sucursal_estado'], 'string'],
            [['sucursal_nombre'], 'string', 'max' => 100],
            [['sucursal_direccion'], 'string', 'max' => 255],
            [['companias_compania_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companias::className(), 'targetAttribute' => ['companias_compania_id' => 'compania_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sucursal_id' => 'Sucursal ID',
            'companias_compania_id' => 'Companias Compania ID',
            'sucursal_nombre' => 'Sucursal Nombre',
            'sucursal_direccion' => 'Sucursal Direccion',
            'sucursal_creado_fecha' => 'Sucursal Creado Fecha',
            'sucursal_estado' => 'Sucursal Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentos()
    {
        return $this->hasMany(Departamentos::className(), ['sucursales_sucursal_id' => 'sucursal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniasCompania()
    {
        return $this->hasOne(Companias::className(), ['compania_id' => 'companias_compania_id']);
    }
}
