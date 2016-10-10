<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ParametrizacionDatosEnvio".
 *
 * @property integer $id
 * @property string $DatoXml
 * @property string $Campo
 * @property integer $Tipo
 * @property string $Valor
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
            [['DatoXml','Campo', 'Tipo','Valor'], 'required'],
            [['Tipo'], 'integer'],
            [['DatoXml', 'Campo'], 'string', 'max' => 100],
            [['Valor'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'DatoXml' => 'Nombre',
            'Campo' => 'Campo',
            'Tipo' => 'Tipo',
            'Valor'=>'Valor'
        ];
    }
    public static function getTablaDistinct() {
        
        
       return  ParametrizacionDatosEnvio::find()->select('DISTINCT `Tabla`')->all();

        
       
    }
    public static function getCampos($Tabla){
         return ParametrizacionDatosEnvio::find()
        ->where(['=', 'Tabla', $Tabla])
        ->all();
    }

}
