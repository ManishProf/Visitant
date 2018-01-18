<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Visitor */

$this->title = 'Update Visitor: ' . $model->Visitor_id;
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Visitor_id, 'url' => ['view', 'id' => $model->Visitor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="visitor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
