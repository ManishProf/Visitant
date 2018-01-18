<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['employee'],
        'method' => 'get',
    ]); ?>


    <?php echo $form->field($model, 'empname')->textinput(['style'=>['width' => '20%']]) ?>
    <?php echo $form->field($model, 'empcontact')->textinput(['style'=>['width' => '20%']]) ?>


    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Reset', ['employee'],['class' => 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
