<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Category;
use yii\helpers\ArrayHelper;
//use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Visitor */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="visitor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Visitor_name')->textInput(['maxlength' => true,'style'=>['width' => '30%']]) ?>

    <?= $form->field($model, 'Company_name')->textInput(['maxlength' => true,'style'=>['width' => '30%']]) ?>

    <?= $form->field($model, 'Contact_number')->textInput(['style'=>['width' => '30%']]) ?>

    <?= $form->field($model, 'Email_Id')->textInput(['maxlength' => true,'style'=>['width' => '30%']]) ?>

    <?= $form->field($model, 'Purpose')->textarea(['rows' => '4','maxlength' => true,'style'=>['width' => '30%']]) ?>

    <?php echo $form->field($model, 'PersonToMeet')->dropDownList(ArrayHelper::map(Category::find()->all(),'categoryname','categoryname'),['prompt'=>'Select...','style'=>['width' => '30%']]) ?>
  <!--  <?php //echo $form->field($model, 'PersonToMeet')->textInput(['maxlength' => true,'style'=>['width' => '30%']]) ?> !--> 
    
   <!--<?php //echo $form->field($model, 'empname')->dropDownList($listData,['prompt'=>'Select...'])->label('PersonToMeet'); ?> !--> 

    <?= $form->field($model, 'Address')->textInput(['maxlength' => true,'style'=>['width' => '30%']]) ?>

    <?= $form->field($model, 'Govt_Id')->textInput(['placeholder'=>'AadharCardId','maxlength' => true,'style'=>['width' => '30%']]) ?>
    


  <!--  <?php//$form->field($model, 'Date')->widget(DatePicker::classname(), ['language' => 'en','dateFormat' => 'yyyy-MM-dd','options' => ['style'=>'width:30%;', 'class'=>'form-control'] ]) ?> !-->


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
