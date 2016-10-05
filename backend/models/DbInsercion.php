<?php
namespace backend\Models;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Yii;
use yii\data\SqlDataProvider;

class DbInsercion{
    public $Campo;
    public $valor;


    public function getTabla($campo)
    {
        $TablaMapeo = new SqlDataProvider([
                    'sql' => 'SELECT Tabla, Campo FROM ParametrizacionDatosEnvio WHERE Campo=:Campo',
                    'params' => [':Campo' => $NombreCampo],
                ]);
               $Tablas= $TablaMapeo->getModels();
               $count=$TablaMapeo->getCount();
        
                foreach ($Tablas as $Tabla=>$Valor)
                {
                 //   $ValorTabla
                   return $Valor;
                }
      
    }

    
}
