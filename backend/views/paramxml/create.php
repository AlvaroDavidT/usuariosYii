<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Paramxml */

$this->title = 'Create Paramxml';
$this->params['breadcrumbs'][] = ['label' => 'Paramxmls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paramxml-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
