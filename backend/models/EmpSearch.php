<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use backend\models\Visitantmaster;
use backend\models\Visitanttransaction;

/**
 * VisitorSearch represents the model behind the search form about `backend\models\Visitor`.
 */
class EmpSearch extends Visitantmaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visitor_id', 'del', 'contact_number'], 'integer'],
            [['visitor_name', 'company_name', 'address', 'govt_idtype', 'govt_idvalue', 'status'], 'safe'],
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
       $query= new Query;

       $query->select(['visitantmaster.visitor_name','visitanttransaction.purpose','visitanttransaction.emp_name', 'visitanttransaction.checkin_time', 'visitanttransaction.checkout_time', ])->from('visitanttransaction')->leftJoin('visitantmaster','visitantmaster.visitor_id= visitanttransaction.Visitor_id')->where('visitanttransaction.emp_id=:empid',[':empid'=>$id]);

     
   
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 7 ],
        ]);

       return $dataProvider;
    }
}