<?php
use yii\helpers\Html;

?>
<?php


/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron alert-danger text-center" >
        <?= Html::img('@web/images/flat-secure1.png', ['alt'=>Yii::$app->name,'style'=>'width:100px;'])
        ?>
        <h2>Acceso denegado!!!!</h2>
       
        

        </div>

    
</div>
