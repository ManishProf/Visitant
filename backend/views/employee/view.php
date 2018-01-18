<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = $model->empname;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['employee']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

<?php if(Yii::$app->session->hasFlash('successMessage')){?>
            <div class="alert alert-success">
                <?php echo Yii::$app->session->getFlash('successMessage')?>
            </div>
<?php } ?> 

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->empid], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->empid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'empid',
            'empname',
            'empemail',
            'empcontact',
            'empdepartment',
            'empdesignation',
            //'softdel',
        ],
    ]) ?>

</div>
