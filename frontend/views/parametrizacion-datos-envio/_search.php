<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ParametrizacionDatosEnvioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametrizacion-datos-envio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'DatoXml') ?>

    <?= $form->field($model, 'Tabla') ?>

    <?= $form->field($model, 'Campo') ?>

    <?= $form->field($model, 'Tipo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
