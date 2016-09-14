<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Parametrizacion */

$this->title = 'Update Parametrizacion: ' . $model->parametrizacion_id;
$this->params['breadcrumbs'][] = ['label' => 'Parametrizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->parametrizacion_id, 'url' => ['view', 'id' => $model->parametrizacion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parametrizacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
