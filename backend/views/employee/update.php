<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = 'Update Employee: ' . $model->empname;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['employee']];
$this->params['breadcrumbs'][] = ['label' => $model->empname, 'url' => ['view', 'id' => $model->empid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-update">

   <!-- <h1><?php //echo Html::encode($this->title) ?></h1> !-->

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
