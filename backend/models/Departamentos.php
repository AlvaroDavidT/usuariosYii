<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departamentos".
 *
 * @property integer $departamento_id
 * @property integer $sucursales_sucursal_id
 * @property string $departamento_nombre
 * @property integer $companias_compania_id
 * @property string $departamento_creado_fecha
 * @property string $deparamento_estado
 *
 * @property Companias $companiasCompania
 * @property Sucursales $sucursalesSucursal
 */
class Departamentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sucursales_sucursal_id', 'departamento_nombre', 'companias_compania_id', 'departamento_creado_fecha', 'deparamento_estado'], 'required'],
            [['sucursales_sucursal_id', 'companias_compania_id'], 'integer'],
            [['departamento_creado_fecha'], 'safe'],
            [['deparamento_estado'], 'string'],
            [['departamento_nombre'], 'string', 'max' => 100],
            [['companias_compania_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companias::className(), 'targetAttribute' => ['companias_compania_id' => 'compania_id']],
            [['sucursales_sucursal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sucursales::className(), 'targetAttribute' => ['sucursales_sucursal_id' => 'sucursal_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'departamento_id' => 'Departamento ID',
            'sucursales_sucursal_id' => 'Sucursales Sucursal ID',
            'departamento_nombre' => 'Departamento Nombre',
            'companias_compania_id' => 'Companias Compania ID',
            'departamento_creado_fecha' => 'Departamento Creado Fecha',
            'deparamento_estado' => 'Deparamento Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniasCompania()
    {
        return $this->hasOne(Companias::className(), ['compania_id' => 'companias_compania_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursalesSucursal()
    {
        return $this->hasOne(Sucursales::className(), ['sucursal_id' => 'sucursales_sucursal_id']);
    }
}
