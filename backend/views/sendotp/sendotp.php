<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

		/* @var $this yii\web\View */
		/* @var $model backend\models\Sendsms */
		/* @var $form ActiveForm */
		$this->title = 'Send OTP';
		$this->params['breadcrumbs'][] = $this->title;
		?>
		<div class="site-sendotp">
            
            <?php if(Yii::$app->session->hasFlash('successMessage')){?>
			<div class="alert alert-success">
				<?php echo Yii::$app->session->getFlash('successMessage')?>
		    </div>
		    <?php } ?> 
		    
		    <?php $form = ActiveForm::begin(); ?>
		        <?php echo $form->field($model, 'contact_number')->textInput(['maxlength' => 10,'type'=>'text','class' => 'phone','style'=>['width'=>'30%']]); ?> 
		        	    
		        <div class="form-group">
		            <?php echo Html::submitButton('Send OTP',['class' => 'btn btn-primary']) ?>
		        </div>
		    <?php ActiveForm::end(); ?>

		</div><!-- site-sendotp -->