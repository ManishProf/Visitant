<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Visitantmaster;
use backend\models\Visitanttransaction;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\VisitorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visitor Report';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="visitor-index">
   
    <?php if(Yii::$app->session->hasFlash('successMessage')){?>
      <div class="alert alert-success">
        <?php echo Yii::$app->session->getFlash('successMessage')?>
        </div>
        <?php } ?> 

   <h4 align="center" style="font-family:courier;"><b>Visitor Report With CheckIN and CheckOut Display Time</b></h4> 
<!--  <?php // echo $this->render('search', ['model' => $searchModel]); ?> !-->

<?php Pjax::begin(); ?>    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         
            //'Visitor_name',
             [
              'label'=>'Visitor Name',
              'attribute'=>'visitor_name',
              'value'=>'visitor_name',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ],
          // 'Company_name',
         /*     [
              'label'=>'Company Name',
              'attribute'=>'company_name',
              'value'=>'company_name',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
              ], */
            //'contact_number',
               [
              'label'=>'Contact Number',
              'attribute'=>'contact_number',
              'value'=>'contact_number',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
               ], 
          
              // 'Visitor_id',
            /*   [
              'label'=>'Visitor Id',
              'attribute'=>'visitor_id',
              'value'=>'visitor_id',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
               ], */
             
              
            // 'status',
           /* [
              'label'=>'Status',
              'attribute'=>'status',
              'value'=>'status',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
            ],*/
            
             //'Visitor_id',
               //'Purpose',
               [
              'label'=>'Purpose',
              'attribute'=>'visitor_id',
              'value'=>'visitanttransaction.purpose',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
               ],

                [
              'label'=>'Person To Meet',
              'attribute'=>'visitor_id',
              'value'=>'visitanttransaction.emp_name',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
               ],

              [
              'label'=>'Check in Time',
              'attribute'=>'visitor_id',
              //'format' => 'relativetime',
              'format' => ['datetime','full'],
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

         
        ],
        
    ]); ?>
<?php Pjax::end(); ?></div>

