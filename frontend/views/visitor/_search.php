<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\VisitorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visitor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Visitor_id')->textinput(['style'=>['width' => '20%']]) ?>

    <?php //$form->field($model, 'Visitor_name') ?>

    <?php //$form->field($model, 'Company_name') ?>

    <?php //$form->field($model, 'Contact_number') ?>

    <?php //$form->field($model, 'Email_Id') ?>

    <?php // echo $form->field($model, 'Purpose') ?>

    <?php // echo $form->field($model, 'PersonToMeet') ?>

    <?php // echo $form->field($model, 'Address') ?>

    <?php // echo $form->field($model, 'Govt_Id') ?>

    <?php // echo $form->field($model, 'Date') ?>

    <?php // echo $form->field($model, 'soft_del') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
