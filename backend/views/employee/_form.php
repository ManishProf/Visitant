<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'empname')->textInput(['maxlength' => true,'style'=>['width' => '30%']])->label('Employee Name') ?>

    <?php echo  $form->field($model, 'empemail')->textInput(['maxlength' => true,'style'=>['width' => '30%']])->label('Employee Email Id') ?>

    <?php echo $form->field($model, 'empcontact')->textInput(['maxlength' => 10,'style'=>['width' => '30%']])->label('Employee Contact Number') ?>

    <?php echo $form->field($model, 'empdepartment')->textInput(['maxlength' => true,'style'=>['width' => '30%']])->label('Employee Department') ?>

    <?php echo $form->field($model, 'empdesignation')->textInput(['maxlength' => true,'style'=>['width' => '30%']])->label('Employee Designation') ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php echo Html::a('Cancel', ['employee'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
