<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ArchivosSubidos".
 *
 * @property integer $id
 * @property string $numeroAutorizacion
 * @property string $razonSocial
 * @property integer $ruc
 */
class ArchivosSubidos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ArchivosSubidos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'numeroAutorizacion', 'razonSocial', 'ruc'], 'required'],
            [['id', 'ruc'], 'integer'],
            [['numeroAutorizacion'], 'string', 'max' => 37],
            [['razonSocial'], 'string', 'max' => 120],
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
        ];
    }
}
