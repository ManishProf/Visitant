<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Visitantmaster */

$this->title = 'Create Visitor';
$this->params['breadcrumbs'][] = ['label' => 'Visitor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitantmaster-create">

  <?php if(Yii::$app->session->hasFlash('successMessage')){?>
			<div class="alert alert-success">
				<?php echo Yii::$app->session->getFlash('successMessage')?>
		    </div>
		    <?php } ?> 

    <?php echo $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
    ]) ?>

</div>
