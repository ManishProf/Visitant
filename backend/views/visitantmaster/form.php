<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Sendsms;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Visitantmaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visitantmaster-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'visitor_name')->textInput(['maxlength' => true,'style'=>['width' => '30%']]) ?>

    <?php echo  $form->field($model, 'company_name')->textInput(['maxlength' => true,'style'=>['width' => '30%']]) ?>

   <?php echo  $form->field($model, 'contact_number')->textInput(['readonly' => true,'style'=>['width' => '30%']]) ?>
    
    <?php echo $form->field($model, 'address')->textarea(['rows' => '4','maxlength' => true,'style'=>['width' => '30%']]) ?>

       <?php 
    echo $form->field($model, 'govt_idtype')->widget(Select2::classname(), [
        'data' => ['Pan Card Id' => 'Pan Card Id', 'Aadhaar Card Id' => 'Aadhaar Card Id', 'Student Car Id' =>'Student Car Id','Drivinglicence Card Id' => 'Drivinglicence Card Id','None' => 'None'],
        'language' => 'en',
        'options' => ['placeholder' => 'Select ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'width' => '30%',
        ],
    ]); ?>

    <?php echo $form->field($model, 'govt_idvalue')->textInput(['maxlength' => true,'style'=>['width' => '20%']]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php echo Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
