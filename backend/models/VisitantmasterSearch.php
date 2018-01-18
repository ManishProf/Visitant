<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Visitantmaster;

/**
 * VisitantmasterSearch represents the model behind the search form about `backend\models\Visitantmaster`.
 */
class VisitantmasterSearch extends Visitantmaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visitor_id', 'del', 'contact_number'], 'integer'],
            [['visitor_name', 'visitor_id','company_name', 'address', 'govt_idtype', 'govt_idvalue', 'status'], 'safe'],
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
    public function search($params)
    {
        $query = Visitantmaster::find();
        $query->joinwith(['visitanttransaction']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 7 ],
            'sort' => [
        'defaultOrder' => [
            'visitor_id' => SORT_DESC, 
        ]
    ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'del' => $this->del= 0,
        ]);

        $query->andFilterWhere(['like', 'visitantmaster.visitor_name', $this->visitor_name])->andFilterWhere(['like', 'visitantmaster.contact_number', 
            $this->contact_number]);
            
        return $dataProvider;
    }

    
}
