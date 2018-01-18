<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Visitantmaster;
use backend\models\Visitanttransaction;
use yii\db\Query;

/**
 * VisitorSearch represents the model behind the search form about `backend\models\Visitor`.
 */
class ReportSearch extends Visitanttransaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
         return [
            [['visitor_id', 'emp_id'], 'integer'],
            [['purpose','emp_name','checkin_time','checkout_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($id)
    { 
       /*$this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        } */

        
       $query= new Query;

       $query->select(['visitantmaster.visitor_name','visitantmaster.contact_number','visitanttransaction.visitor_id','visitanttransaction.emp_name','visitanttransaction.purpose', 'visitanttransaction.checkin_time', 'visitanttransaction.checkout_time', ])->from('visitanttransaction')->leftJoin('visitantmaster','visitantmaster.visitor_id= visitanttransaction.visitor_id')->where('visitanttransaction.visitor_id=:visitorid',[':visitorid'=>$id]);

      
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 7 ],
        ]);
        

        
     //  $query->andFilterWhere(['like', 'visitanttransaction.checkin_time', $this->checkin_time]);
        
   
         return $dataProvider;
    }
}