<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;



$this->title = 'Procesar archivos subidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index">


    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Procesar', ['procesar'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],
            'Autorizacion_Numero',
            'PathXml',
            'Estado'
        ],
    ]);
echo \yii\helpers\Html::buttonInput("Presioname!", ['onclick' => 'verAlertJS();']);

    ?>
    
</div>
