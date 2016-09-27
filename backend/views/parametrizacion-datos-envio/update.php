<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ParametrizacionDatosEnvio */

$this->title = 'Update Parametrizacion Datos Envio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Parametrizacion Datos Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parametrizacion-datos-envio-update">

    <h5><?= Html::encode($this->title) ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
