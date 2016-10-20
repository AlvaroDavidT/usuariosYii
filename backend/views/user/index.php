<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table  table-bordered table-hover',
            
            ],
        'columns' => [
            
            ['class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['class' => 'text-center','style' => 'width: 30px;color:#E51919; background-color: lightblue;',],
                'contentOptions' => ['style' => 'width: 30px;color:#E51919;', 
                                     'class' => 'text-center'],
                
                ],
              [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'username',
                     'headerOptions' => ['class' => 'text-center','style' => 'width: 30px;color:#E51919; background-color: lightblue;',],
                   'label' => 'username',
                        'contentOptions' => ['style' => 'width: 130px;',
                                             'class' => 'text-center'],
              ],

         //   'id',
            
            //'auth_key',
           // 'password_hash',
            //'password_reset_token',
             [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'email',
                     'headerOptions' => ['class' => 'text-center','style' => 'width: 30px;color:#E51919; background-color: lightblue;',],
                   'label' => 'E-mail',
                        'contentOptions' => ['style' => 'width: 130px;',
                                             'class' => 'text-center'],
              ],
            
        //    'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn',
              'contentOptions' => ['style' => 'width: 130px;',
                                             'class' => 'text-center'],
                     'headerOptions' => ['class' => 'text-center','style' => 'width: 30px;color:#E51919; background-color: lightblue;',],
                
                'header'=>'Acciones',
'buttons' => [

            //view button
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'View'),
                            'class'=>'btn btn-primary btn-sm',                                  
                ]);
            },
            //delete button
              'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'delete'),
                            'class'=>'btn btn-danger btn-sm',                                  
                ]);
            },
        ],

                ],
            
        ],
        
               
        'rowOptions' => function ($model) {
                return ['id' => $model['username'], 
                    'onclick' => 'muestra1(this.id);',
                    'style' => "cursor: pointer",
                    ];
        },
    ]); ?>
    
    
  
    
    <script>
     function muestra1($var){      
         alert ($var+" desde mi funcion")   ;   
     }
  </script>
</div>
