<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Companias */

$this->title = $model->compania_id;
$this->params['breadcrumbs'][] = ['label' => 'Companias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->compania_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->compania_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        //    'compania_id',
            'compania_nombre',
            'compania_email:email',
            'compania_direccion',
           // 'logo',
           // 'compania_inicio_fecha',
            'compania_creado_fecha',
            'compania_estado',
        ],
    ]) ?>

</div>
