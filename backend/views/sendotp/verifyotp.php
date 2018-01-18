<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

		/* @var $this yii\web\View */
		/* @var $model backend\models\Sendsms */
		/* @var $form ActiveForm */
		$this->title = 'Verify OTP';
		$this->params['breadcrumbs'][] = $this->title;
		?>
		<div class="site-sendotp">

			<?php if(Yii::$app->session->hasFlash('successMessage')){?>
			<div class="alert alert-success">
				<?php echo Yii::$app->session->getFlash('successMessage')?>
		    </div>
		    <?php } ?> 

		  

		   <?php $form = ActiveForm::begin(); ?>
		        <?php echo  $form->field($model, 'otp_number')->textInput(['type'=>'text','style'=>['width'=>'30%']]); ?> 
		        	    
		        <div class="form-group">
		            <?php echo  Html::submitButton('Verify OTP',['class' => 'btn btn-primary']) ?>
		        </div>
		    <?php ActiveForm::end(); ?> 

		</div><!-- site-sendotp -->