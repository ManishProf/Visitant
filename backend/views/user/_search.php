<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

   
    <?php echo $form->field($model, 'username')->textinput(['style'=>['width' => '20%']])->label('Username')?>

    <?php echo $form->field($model, 'email')->textinput(['style'=>['width' => '20%']])->label('Email') ?>

 
    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
         <?php echo Html::a('Reset', ['index'],['class' => 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
