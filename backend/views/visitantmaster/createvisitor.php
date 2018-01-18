<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Visitor */

$this->title = 'Create New Visit';
$this->params['breadcrumbs'][] = ['label' => 'Visitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitor-create">

  <?php if(Yii::$app->session->hasFlash('successMessage')){?>
			<div class="alert alert-success">
				<?php echo Yii::$app->session->getFlash('successMessage')?>
		    </div>
		    <?php } ?> 

    
    <?php echo $this->render('createform', [
        'model' => $model,
    ]) ?>

</div>
