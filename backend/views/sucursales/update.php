<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sucursales */

$this->title = 'Update Sucursales: ' . $model->sucursal_id;
$this->params['breadcrumbs'][] = ['label' => 'Sucursales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sucursal_id, 'url' => ['view', 'id' => $model->sucursal_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sucursales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
