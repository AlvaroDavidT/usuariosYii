<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ParametrizacionEnvioRetenciones".
 *
 * @property integer $id
 * @property string $Nombre
 * @property string $Campo
 * @property integer $Tipo
 * @property string $Valor
 */
class ParametrizacionEnvioRetenciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ParametrizacionEnvioRetenciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Campo', 'Tipo', 'Valor'], 'required'],
            [['Tipo'], 'integer'],
            [['Valor'], 'string'],
            [['Nombre', 'Campo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nombre' => 'Nombre',
            'Campo' => 'Campo',
            'Tipo' => 'Tipo',
            'Valor' => 'Valor',
        ];
    }
}
