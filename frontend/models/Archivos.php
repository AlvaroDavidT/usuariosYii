<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Archivos".
 *
 * @property integer $id
 * @property string $Autorizacion_Numero
 * @property string $PathXml
 * @property string $Estado
 */
class Archivos extends \yii\db\ActiveRecord
{
    
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Archivos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Autorizacion_Numero', 'PathXml', 'Estado'], 'required'],
            [['id'], 'integer'],
            [['Estado'], 'string'],
            [['PathXml'], 'string', 'max' => 250],
            [['Autorizacion_Numero'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID',
            'Autorizacion_Numero' => 'Autorizacion  Numero',
            'PathXml' => 'Path Xml',
            'Estado' => 'Estado',
        ];
    }
  

   

}
