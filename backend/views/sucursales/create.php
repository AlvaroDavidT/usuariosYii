<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sucursales */

$this->title = 'Create Sucursales';
$this->params['breadcrumbs'][] = ['label' => 'Sucursales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sucursales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
