<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
//use yii\bootstrap\Alert;
$this->title = 'Parametrizacion Base de Datos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametrizacion-datos-envio-index">
 <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

 <p>
        <?=
        Html::a('Nuevo', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-primary glyphicon glyphicon-plus-sign',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0',
        ]);
        ?>
</p>

<?php Pjax::begin() ?>
    <?=
    GridView::widget([
        'id' => 'Parr-grid',
        'dataProvider' => $dataProvider,
        'showFooter' => true,
        'emptyCell' => '.',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           'BDD',
            'StringBDD',
            'SchemaBDD',
            'PasswordBDD',
            'UserBDD',
            'Tabla',
             ['class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '', 'label' => 'Action'],
                'template' => '{update}{delete}',
                'buttons' => ['update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                    'id' => 'activity-index-link',
                                    'title' => Yii::t('app', 'Update'),
                                    'data-toggle' => 'modal',
                                    'data-target' => '#modal',
                                    'data-url' => Url::to(['update', 'id' => $model->id]),
                                    'data-pjax' => '0',
                        ]);
                    },
                        ]
                    ],
            ]]);
            ?>
            <?php Pjax::end() ?>
            <?php
            $this->registerJs(
                    "$(document).on('click', '#activity-index-link', (function() {
                $.get(
                    $(this).data('url'),
                    function (data) {
                        $('.modal-body').html(data);
                        $('#modal').modal();           
                    }
                );
            }));"
            );
            ?>
         <?php
            Modal::begin([
                'id' => 'modal',
                'header' => '<h4 class="modal-title">Complete los campos</h4>',
                // 'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
                'size' => 'modal-m',
                'options' => [
                    'title' => 'crear registro',
                ]
            ]);
           
            Modal::end();
            
            
            
                   
            ?>

</div>