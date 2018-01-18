<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\VisitorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Visitor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Visitor_id',
            'Visitor_name',
            'Company_name',
            'Contact_number',
            'Email_Id:email',
            'Purpose',
            'PersonToMeet',
            'Address',
            'Govt_Id',
            'Date',
            // 'soft_del',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
