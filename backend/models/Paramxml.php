<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Paramxml".
 *
 * @property integer $id
 * @property string $Tag_xml
 * @property string $Descripcion
 * @property integer $Estado
 */
class Paramxml extends \yii\db\ActiveRecord
{
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Paramxml';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Tag_xml', 'Descripcion', 'Estado'], 'required'],
            [['Estado'], 'integer'],
            [['Tag_xml'], 'string', 'max' => 150],
            [['Descripcion'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Tag_xml' => 'Tag Xml',
            'Descripcion' => 'Descripcion',
            'Estado' => 'Estado',
        ];
    }
    
 
    
}
