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

$this->title =$visitorName."'s Report"; 
//$this->title ="Visitor's Report";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="visitor-index">
   
    <?php if(Yii::$app->session->hasFlash('successMessage')){?>
      <div class="alert alert-success">
        <?php echo Yii::$app->session->getFlash('successMessage')?>
        </div>
        <?php } ?> 

   <h4 align="center" style="font-family:courier;"><b><?php echo $visitorName ?>'s Report With CheckIN and CheckOut Display Time</b></h4> 
  
  <?php //echo $this->render('search', ['model' => $searchModel]); ?> 

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
              'attribute'=>'purpose',
              'value'=>'purpose',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
               ],

                [
              'label'=>'Person To Meet',
              'attribute'=>'emp_name',
              'value'=>'emp_name',
              'contentOptions'=>['style'=>'max-width: 20px;white-space:normal'],
               ],

              [
              'label'=>'Check in Time',
              'attribute'=>'checkin_time',
              //'format' => 'relativetime',
              'format' => ['datetime','full'],
              'value'=>'checkin_time',
              'contentOptions'=>['style'=>'max-width: 20px;white-space: normal'],
              ],
              
              [  
             'label'=>'Check Out Time',
             'attribute'=>'checkout_time',
              //'format' => 'relativetime',
              'format' => ['datetime','full'],
              'value'=>'checkout_time',
             'contentOptions'=>['style'=>'max-width: 20px;white-space: normal'],
              ],

         
        ],
        
    ]); ?>
<?php Pjax::end(); ?></div>

