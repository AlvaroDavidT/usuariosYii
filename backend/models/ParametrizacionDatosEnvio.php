<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ParametrizacionDatosEnvio".
 *
 * @property integer $id
 * @property string $DatoXml
 * @property string $Tabla
 * @property string $Campo
 * @property integer $Tipo
 */
class ParametrizacionDatosEnvio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ParametrizacionDatosEnvio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DatoXml', 'Tabla', 'Campo', 'Tipo'], 'required'],
            [['Tipo'], 'integer'],
            [['DatoXml', 'Tabla', 'Campo'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'DatoXml' => 'Dato Xml',
            'Tabla' => 'Tabla',
            'Campo' => 'Campo',
            'Tipo' => 'Tipo',
        ];
    }
}
