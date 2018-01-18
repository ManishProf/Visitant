<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = 'Employee Registration';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['employee']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-create">

  <!--  <h1><?php //echo Html::encode($this->title)  ?></h1> !-->

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
