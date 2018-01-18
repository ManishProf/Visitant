<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Visitor */

$this->title = $model->Visitor_id;
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Visitor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Visitor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<div class="row" style="width:50%; ">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Visitor_id',
            'Visitor_name',
            'Company_name',
            //'Contact_number',
           //'Email_Id:email',
            'Purpose',
            'PersonToMeet',
            //'Address',
           // 'Govt_Id',
             'Date',
            //'soft_del',
        ],
    ]) ?>
</div>
</div>
