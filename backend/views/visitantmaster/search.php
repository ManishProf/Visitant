<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VisitorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visitor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['report'],
        'method' => 'get',
    ]); ?>

   

    <?php echo $form->field($model, 'checkin_time')->textinput(['style'=>['width' => '20%']])->label('Visitor check in time')?>

  

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
         <?php echo Html::a('Reset', ['visitantmaster/report'],['class' => 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>