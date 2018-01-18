<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Sendemail;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class SendemailController extends Controller
{
     public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }

    
    // Send email OTP module

    public function actionSendemail()
    {   
      	$model=new Sendemail();

      	if ($model->load(Yii::$app->request->post()) )
      		{     
                
                $record=Sendemail::find()->where(['email'=>$model->email, 'status'=> 1])->one();
               
                if($record == false)
                {
                
                 $num=rand(100000,999999);
                 $mes='Your Verification Code for Mediology Software Registeration is '. $num;

                  
                 if($model->sendEmail($model->email, $mes))
                  {
                    $model->otpnumber = $num;
                    $model->save(); 
                    $id=$model->getPrimaryKey();
                    Yii::$app->session->setFlash('successMessage',"Verification code has sent Successfully");
                    return $this->redirect(['verifyemail','id'=>$id]);
                  } 

                  else
                  {
                  Yii::$app->session->setFlash('successMessage',"Verification Code has been not sent");
                  return $this->refresh();
                  }
                      
                }

                else
                {
                  Yii::$app->session->setFlash('successMessage',"visitor has been verified already");
                  return $this->refresh();
                }
                  
          }

      return $this->render('sendemail',['model'=>$model]);
    }

    
    // Verify Email OTP Module

     public function actionVerifyemail($id)
    {   
      
          $model = new \yii\base\DynamicModel([
            'otpnumber'
          ]);
          if(Yii::$app->request->post())
          {
            $otpnumber = $_POST['DynamicModel']['otpnumber'];
            $model=$this->findModel($id);
            if(($otpnumber)==($model->otpnumber))
            {	
              $model->status='1';
              $model->save();
              Yii::$app->session->setFlash('successMessage',"Visitor Verified Successfully");
              return $this->redirect(['/visitor/create']);
            } 
          }  
          
          return $this->render('verifyemail',['model'=>$model]);
          
    } 
        
        
     protected function findModel($id)
    {
            if (($model = Sendemail::findOne($id)) !== null) 
            {
                return $model;
            }
           else 
            {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
    }

}
