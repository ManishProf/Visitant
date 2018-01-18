<?php

namespace backend\controllers;

use Yii;
use backend\models\Visitantmaster;
use backend\models\VisitantmasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Employee;
use backend\models\Visitanttransaction;
use backend\models\Sendsms;
use backend\models\ReportSearch;
use backend\models\VisitorSearch;

/**
 * VisitantmasterController implements the CRUD actions for Visitantmaster model.
 */
class VisitantmasterController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Visitantmaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VisitantmasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Visitantmaster model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Visitantmaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Visitantmaster();
        $model2 = new Visitanttransaction();

        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post()) )
         {   

             //Notification Send to Particular Employee on Visitor Visit 

                $emp=Employee::find()->where(['empid'=>$model2->emp_id])->one();
                $mobileno=urlencode($emp->empcontact);
                $mes=urlencode($model->visitor_name.' has come to meet you');
                $username=urlencode('readwhere');
                $password=urlencode('452147266');
                $sendername=urlencode('RDWHRE');

    $data = 'username=' . $username . '&password=' . $password . '&mobileno=' .  $mobileno . "&sendername=" . $sendername . "&message=" . $mes;
                
                $ch = curl_init('http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?'.$data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
                $response = curl_exec($ch);
                $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);  
                
                $res1="Your message has been not sent.";
                $res2="Your message is successfully sent to:91".$mobileno;

                if(($responseCode == 200) && (strcasecmp($response, $res2) == 2))
                { 
                        $model->save();
                        $model2->visitor_id=$model->visitor_id;
                        $model2->emp_name=$emp->empname;
                        $datetime=gmdate("Y-m-d H:i:s",strtotime('+5 hours 30 minutes'));
                        $model2->checkin_time=$datetime;
                        $model2->save();
                        $session = Yii::$app->session;
                        $session->remove('contact_number');
                        Yii::$app->session->setFlash('successMessage','Visitor has been Created Successfully'); 
                        return $this->redirect(['visitantmaster/index']);
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
            return $this->render('create', [
                'model' => $model, 
                'model2' => $model2,
            ]);
        }
    }

    /**
     * Updates an existing Visitantmaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('successMessage','Visitor has been updated Successfully'); 
            return $this->redirect(['view', 'id' => $model->visitor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Visitantmaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model= $this->findModel($id);
        $model->del = 1;
        $model->save();
        Yii::$app->session->setFlash('successMessage','Visitor has been Deleted Successfully'); 
        return $this->redirect(['index']);
    }
    
     
     public function actionCheckout($id)
    {
        $model= $this->findModel($id);
        $v=Visitanttransaction::find()->where(['visitor_id' =>$id,'checkout_time'=> null])->one();
        
        if($model!= null &&  $v!= null)       
        {            
            if(($v->checkout_time)==null)
            {
            
                $datetime=gmdate("Y-m-d H:i:s",strtotime('+5 hours 30 minutes'));
                $v->checkout_time=$datetime;
                $v->save();
               
               $model->status='Inactive';
               $model->save(false);
            
        
            Yii::$app->session->setFlash('successMessage','Visitor has been Checked Out Successfully');
            return $this->redirect(['index']);
          
            }
         
           
        }
         else
             {
               Yii::$app->session->setFlash('successMessage','Visitor has been Checked Out Already');
               return $this->redirect(['index']);
               
             }

    }    



     public function actionCreatevisitor($id)
    {  
        $model =new Visitanttransaction();
        $visitantmaster=$this->findModel($id);

        if($model->load(Yii::$app->request->post()))
        {   
            $emp=Employee::find()->where(['empid'=>$model->emp_id])->one();
            $mobileno=urlencode($emp->empcontact);
            $mes=urlencode($visitantmaster->visitor_name.' has come to meet you');
            $username=urlencode('readwhere');
            $password=urlencode('452147266');
            $sendername=urlencode('RDWHRE');

    $data = 'username=' . $username . '&password=' . $password . '&mobileno=' .  $mobileno . "&sendername=" . $sendername . "&message=" . $mes;
                
                $ch = curl_init('http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?'.$data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
                $response = curl_exec($ch);
                $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);  
                
                $res1="Your message has been not sent.";
                $res2="Your message is successfully sent to:91".$mobileno;

                if(($responseCode == 200) && (strcasecmp($response, $res2) == 2))
                { 
                $model->visitor_id= $id;
                $model->emp_name=$emp->empname;
                $datetime=gmdate("Y-m-d H:i:s",strtotime('+5 hours 30 minutes'));
                $model->checkin_time=$datetime;
                $model->save();
                $visitantmaster->status='active';
                $visitantmaster->save(false);
                Yii::$app->session->setFlash('successMessage','New Visit Created'); 
                return $this->redirect(['index']);
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
         
           $contact=$visitantmaster->contact_number;
           $row=Sendsms::find()->all();
           foreach ($row as $key) 
           {
            if($key->contact_number == $contact && $key->status == 1)
                {   
                   
                    Yii::$app->session->setFlash('successMessage','visitor has been verified already, Go further with registration'); 
                    return $this->render('createvisitor', [
                    'model' => $model,
                ]);
                


                }

           }
     
        }
    } 

 
    public function actionReport($id)
    {   
       
        
        $model = $this->findModel($id);
        $visitorName=$model->visitor_name;
       
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search($id);
        return $this->render('report', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'visitorName' => $visitorName,
        ]);
    }

    
 /*    public function actionVisitorreport($id)
    {   
        $searchModel = new VisitorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);
        return $this->render('visitorreport', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } */ 

    /**
     * Finds the Visitantmaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Visitantmaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Visitantmaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
