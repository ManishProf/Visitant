<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\grid\ActionColumn;
use backend\models\Visitantmaster;
use backend\models\visitanttransaction;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\VisitantmasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visitor Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitantmaster-index">
 
  <?php if(Yii::$app->session->hasFlash('successMessage')){?>
      <div class="alert alert-success">
        <?php echo Yii::$app->session->getFlash('successMessage')?>
        </div>
        <?php } ?>
  
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Visitor', ['sendotp/sendotp'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'visitor_id',
            [
              'label'=>'Visitor ID',
              'attribute'=>'visitor_id',
              'value'=>'visitor_id',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ],
            //'visitor_name',
            [
              'label'=>'Visitor Name',
              'attribute'=>'visitor_name',
              'value'=>'visitor_name',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ],
           // 'company_name',
            [
            
             'label'=>'Company Name',
              'attribute'=>'company_name',
              'value'=>'company_name',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ],

            // 'contact_number',
            [
            
              'label'=>'Contact Number',
              'attribute'=>'contact_number',
              'value'=>'contact_number',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ],

            //'address:ntext',
            [
              'label'=>'Visitor Address',
              'attribute'=>'address',
              'value'=>'address',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ],
           // 'govt_idtype',
            // 'govt_idvalue',
           // 'status',
            [
             
              'label'=>'Visitor Status',
              'attribute'=>'status',
              'value'=>'status',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ],

             [
              'label'=>'Check in Time',
              'attribute'=>'visitor_id',
              //'format' => 'relativetime',
              'format'=> ['datetime','full'],
              'value'=>'visitanttransaction.checkin_time',
              'contentOptions'=>['style'=>'max-width: 20px;white-space: normal'],
              ],
              
              [  
             'label'=>'Check Out Time',
             'attribute'=>'visitor_id',
              //'format' => 'relativetime',
              'format' => ['datetime','full'],
              'value'=>'visitanttransaction.checkout_time',
             'contentOptions'=>['style'=>'max-width: 20px;white-space: normal'],
              ],
            // 'del',

              [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Actions',
             'headerOptions' => 
             ['style' => 'color:SteelBlue'], 
            'template' => '{createvisitor}  {view}  {update}  {delete}  {report}  {checkout}  {visitorreport}',
            'buttons' => [
              

            'report' => function ($url) {
            
            return Html::a(
              '<span class="glyphicon glyphicon-book"></span>',
                $url, 
                [
                    'title' => 'Visitor Report',
                    'data-pjax' => '0',
                ]
                          
                          );
             },

            /*   'visitorreport' => function ($url) {
            
            return Html::a(
              '<span class="glyphicon glyphicon-book"></span>',
                $url, 
                [
                    'title' => 'Visitor Report',
                    'data-pjax' => '0',
                ]
                          
                          );
             }, */ 

              'createvisitor' => function ($url) {
            
            return Html::a(
              '<span class="glyphicon glyphicon-plus-sign"></span>',
                $url, 
                [
                    'title' => 'Create New Visit',
                    'data-pjax' => '0',
                ]
                          
                          );
             },

              'checkout' => function ($url) {
            
            return Html::a(
              '<span class="glyphicon glyphicon-log-out"></span>',
                $url, 
                [
                    'title' => Yii::t('yii', 'Checkout'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to checkout this Visitor?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]
                          
                          );
             },

        
          ],

        ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
