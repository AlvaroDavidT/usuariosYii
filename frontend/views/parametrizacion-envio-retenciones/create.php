<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ParametrizacionDatosEnvio */

$this->title = 'Create Parametrizacion Datos Envio';
$this->params['breadcrumbs'][] = ['label' => 'Parametrizacion Datos Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametrizacion-datos-envio-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
