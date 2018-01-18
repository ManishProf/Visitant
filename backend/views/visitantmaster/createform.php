<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Employee;

use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
//use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Visitor */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="visitor-form">

    <?php $form = ActiveForm::begin(); ?>

     <?php echo $form->field($model, 'purpose')->textarea(['rows' => '4','maxlength' => true,'style'=>['width' => '30%']]) ?> 

      <?php 
    echo $form->field($model, 'emp_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Employee::find()->all(),'empid','empname'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'width' => '30%',
        ],
    ]); ?>

    <div class="form-group">
        <?php echo  Html::submitButton('Create New Visit', ['createvisitor'],['class' => 'btn btn-success']) ?>
        <?php echo Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>