<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Visitantmaster */

$this->title = $model->visitor_name;
$this->params['breadcrumbs'][] = ['label' => 'Visitantmasters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitantmaster-view">

     <?php if(Yii::$app->session->hasFlash('successMessage')){?>
            <div class="alert alert-success">
                <?php echo Yii::$app->session->getFlash('successMessage')?>
            </div>
            <?php } ?> 

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->visitor_id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->visitor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'visitor_id',
            'visitor_name',
            'company_name',
            'contact_number',
            'address',
           // 'govt_idtype',
           // 'govt_idvalue',
          //  'status',
           // 'del',
        ],
    ]) ?>

</div>
