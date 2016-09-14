<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Parametrizacion".
 *
 * @property integer $parametrizacion_id
 * @property string $nombre_parametrizacion
 * @property string $path_parametrizacion
 */
class Parametrizacion extends \yii\db\ActiveRecord
{
    public $path;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Parametrizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_parametrizacion', 'path_parametrizacion'], 'required'],
            [['nombre_parametrizacion'], 'string', 'max' => 100],
            [['path_parametrizacion'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parametrizacion_id' => 'Parametrizacion ID',
            'nombre_parametrizacion' => 'Nombre Parametrizacion',
            'path_parametrizacion' => 'Path Parametrizacion',
             'path' => 'Seleccionar path:',
        ];
    }
     
}
