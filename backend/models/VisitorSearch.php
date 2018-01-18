<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Visitantmaster;
use backend\models\Visitanttransaction;

/**
 * VisitorSearch represents the model behind the search form about `backend\models\Visitor`.
 */
class VisitorSearch extends Visitantmaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
         return [
            [['visitor_id', 'del', 'contact_number'], 'integer'],
            [['visitor_name','visitor_id', 'company_name', 'address', 'govt_idtype', 'govt_idvalue', 'status'], 'safe'],
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
    public function search($params,$id)
    {
        $query = Visitantmaster::find();
        $query->joinwith(['visitanttransaction'])->where(['visitanttransaction.visitor_id' => $id])->all();
       
      
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
        ]);
        
         $this->load($params);
    

       if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        //$query->andFilterWhere(['like', 'visitanttransaction.visitor_id', $this->visitor_id]);
   
         return $dataProvider;
    }
}