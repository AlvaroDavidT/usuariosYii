<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Companias */

$this->title = 'Update Companias: ' . $model->compania_id;
$this->params['breadcrumbs'][] = ['label' => 'Companias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->compania_id, 'url' => ['view', 'id' => $model->compania_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="companias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
