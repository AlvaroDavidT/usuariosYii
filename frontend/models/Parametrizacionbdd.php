<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Parametrizacionbdd".
 *
 * @property integer $id
 * @property string $BDD
 * @property string $StringBDD
 * @property string $SchemaBDD
 * @property string $PasswordBDD
 * @property string $UserBDD
 * @property String $TipoDocumento
 * @property String $Tabla
 */
class Parametrizacionbdd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Parametrizacionbdd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BDD', 'StringBDD', 'SchemaBDD', 'PasswordBDD', 'UserBDD','Tabla','TipoDocumento'], 'required'],
            [['BDD', 'SchemaBDD'], 'string', 'max' => 100],
            [['StringBDD'], 'string', 'max' => 250],
            [['PasswordBDD', 'UserBDD','Tabla'], 'string', 'max' => 50],
            [['TipoDocumento'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'BDD' => 'Bdd',
            'StringBDD' => 'String',
            'SchemaBDD' => 'Formato',
            'PasswordBDD' => 'Password',
            'UserBDD' => 'Usuario',
            'Tabla'=>'Tabla',
            'TipoDocumento'=>'Documento'
        ];
    }
    
    
}
