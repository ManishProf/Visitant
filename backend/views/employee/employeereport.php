<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Visittime;
use backend\models\Visitor;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $empname."'s Report";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

  
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             
           // 'empid',
         /*    [
              'label'=>'Employee ID',
              'value'=>'empid',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
             ], */
            //'Visitor_name',
             [
              'label'=>'Visitor Name',
              'value'=>'visitor_name',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
             ],
            //'Purpose',
             [
              'label'=>'Visitor Purpose',
              'value'=>'purpose',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
             ],

         /*    [
              'label'=>'Person to Meet',
              'value'=>'emp_name',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
             ], */

            //'visitintime',
             [
              'label'=>'Check In Time',
              'value'=>'checkin_time',
              'format' => ['datetime','full'],
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
             ],
            //'visitouttime',  
            [
              'label'=>'Check Out Time',
              'value'=>'checkout_time',
              'format' => ['datetime','full'],
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ]     

        ],
    ]); ?>
<?php Pjax::end(); ?></div>
