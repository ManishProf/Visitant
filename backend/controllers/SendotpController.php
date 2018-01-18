<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Sendsms;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SendotpController extends Controller
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

    public function actionSendotp()
    {   
      	$model=new Sendsms();
        
      	if ($model->load(Yii::$app->request->post()) )
      		{     
               
                $record=Sendsms::find()->where(['contact_number'=>$model->contact_number, 'status'=> 1])->one();
               
                if($record == false)
                {
                
                   $num=rand(100000,999999);
                   $mes='Your Verification Code for Mediology Software Registration is '. $num;

                   $mobile_number =urlencode($model->contact_number);
                   $mess=urlencode($mes);
                   $username=urlencode('readwhere');
                   $password=urlencode('452147266');
                   $sendername=urlencode('RDWHRE');
                   
              $data = 'username=' . $username . '&password=' . $password . '&mobileno=' .  $mobile_number . "&sendername=" . $sendername . "&message=" . $mess;
                  
                  
                  
                    $ch = curl_init('http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?'.$data);
                  

                    
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
                    $response = curl_exec($ch);
                    $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);
                    
               
                    $res1="Your message has been not sent.";
                    $res2="Your message is successfully sent to:91".$mobile_number;

               
                   if(($responseCode == 200) && (strcasecmp($response, $res2) == 2))
                    {
                      $model->otp_number = "$num";
                      $model->save(); 
                      $id=$model->getPrimaryKey();
                      Yii::$app->session->setFlash('successMessage',$response);
                      return $this->redirect(['verifyotp','id'=>$id]);
                    } 
                        
                  
                    elseif(($responseCode == 200) || (strcasecmp($response, $res1) == 0))
                    {
                    
                    Yii::$app->session->setFlash('successMessage',$response);
                    return $this->refresh();
                    } 
                    
                   
                    elseif($responseCode==0)
                    {
                    Yii::$app->session->setFlash('successMessage',"Server Not Found");
                    return $this->refresh();
                    } 
                }

                else
                { 
                  $mess="visitor's contact number as ".$model->contact_number." has been verified already"; 
                  Yii::$app->session->setFlash('successMessage', $mess);
                  $contact_number=$model->contact_number;
                  return $this->redirect(['visitantmaster/index', 'VisitantmasterSearch[contact_number]'=>$contact_number]);

                 
                }

          }

        return $this->render('sendotp',['model'=>$model]);
    }

     public function actionVerifyotp($id)
    {   
      
          $model = new \yii\base\DynamicModel([
            'otp_number'
          ]);
          if(Yii::$app->request->post())
          {
            $otp_number = $_POST['DynamicModel']['otp_number'];
            $model=$this->findModel($id);

            if(($otp_number)==($model->otp_number))
            {	
                $model->status='1';
                $model->save();
                $session = Yii::$app->session;
                $session['contact_number']= $model->contact_number;
                Yii::$app->session->setFlash('successMessage',"Visitor Verified Successfully");
                return $this->redirect(['visitantmaster/create']);

            } 
            else
            {
                Yii::$app->session->setFlash('successMessage',"your Verification code is invalid, please enter valid code!");
                return $this->refresh();
            }
      }  
          
          return $this->render('verifyotp',['model'=>$model]);
      
    } 
    
     protected function findModel($id)
    {
            if (($model = Sendsms::findOne($id)) !== null) 
            {
                return $model;
            }
           else 
           {
                throw new NotFoundHttpException('The requested page does not exist.');
           }
    }

}
