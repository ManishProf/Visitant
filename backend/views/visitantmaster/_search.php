<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VisitantmasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visitantmaster-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <?php echo $form->field($model, 'visitor_name')->textinput(['style'=>['width' => '20%']])->label('Visitor Name') ?>


    <?php echo $form->field($model, 'contact_number')->textinput(['style'=>['width' => '20%']])->label('Visitor Contact Number') ?>
    

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
       <?php echo Html::a('Reset', ['index'],['class' => 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
