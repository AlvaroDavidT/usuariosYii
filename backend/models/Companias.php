<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companias".
 *
 * @property integer $compania_id
 * @property string $compania_nombre
 * @property string $compania_email
 * @property string $compania_direccion
 * @property string $logo
 * @property string $compania_inicio_fecha
 * @property string $compania_creado_fecha
 * @property string $compania_estado
 *
 * @property Departamentos[] $departamentos
 * @property Sucursales[] $sucursales
 */
class Companias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['compania_nombre', 'compania_email', 'compania_direccion', 'compania_estado'], 'required'],
            [['compania_estado'], 'string'],
            [['compania_nombre', 'compania_email'], 'string', 'max' => 100],
            [['compania_direccion'], 'string', 'max' => 255],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'compania_id' => 'Compania ID',
            'compania_nombre' => 'Compania Nombre',
            'compania_email' => 'Compania Email',
            'compania_direccion' => 'Compania Direccion',
            'compania_estado' => 'Compania Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentos()
    {
        return $this->hasMany(Departamentos::className(), ['companias_compania_id' => 'compania_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSucursales()
    {
        return $this->hasMany(Sucursales::className(), ['companias_compania_id' => 'compania_id']);
    }
}
