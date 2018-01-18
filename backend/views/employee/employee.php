<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

<?php if(Yii::$app->session->hasFlash('successMessage')){?>
            <div class="alert alert-success">
                <?php echo Yii::$app->session->getFlash('successMessage')?>
            </div>
<?php } ?> 
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Register Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'empname',
            /*  [
              'label'=>'Employee Name',
              'attribute'=>'empname',
              'value'=>'empname',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
              ], */
            'empemail',
              /*[
              'label'=>'Employee Email',
              'attribute'=>'empemail',
              'value'=>'empemail',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ],*/
            'empcontact',
             /* [
              'label'=>'Employee Contact',
              'attribute'=>'empcontact',
              'value'=>'empcontact',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ], */
           'empid',
             /* [
              'label'=>'Employee Id',
              'attribute'=>'empid',
              'value'=>'empid',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ],*/
            'empdepartment',
             /* [
              'label'=>'Employee Department',
              'attribute'=>'empdepartment',
              'value'=>'empdepartment',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ], */
            'empdesignation',
             /* [
              'label'=>'Employee Designation',
              'attribute'=>'empdesignation',
              'value'=>'empdesignation',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ], */
            // 'softdel',

             [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
             'headerOptions' => 
             ['style' => 'color:SteelBlue'], 
            'template' => '{view} {update} {delete} {employeereport}',
            'buttons' => [
            
            'employeereport' => function ($url) {
            
            return Html::a(
              '<span class="glyphicon glyphicon-book"></span>',
                $url, 
                [
                    'title' => 'Employee report',
                    'data-pjax' => '0',
                ]
                          
                          );
             },
          ],

        ],

        ],
    ]); ?>
<?php Pjax::end(); ?></div>
