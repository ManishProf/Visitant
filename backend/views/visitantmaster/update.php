<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Visitantmaster */

$this->title = 'Update Visitor: ' . $model->visitor_name;
$this->params['breadcrumbs'][] = ['label' => 'Visitantmasters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->visitor_name, 'url' => ['view', 'id' => $model->visitor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="visitantmaster-update">

   

    <?= $this->render('form', [
        'model' => $model,
    ]) ?>

</div>
