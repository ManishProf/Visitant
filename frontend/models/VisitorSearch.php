<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Visitor;

/**
 * VisitorSearch represents the model behind the search form about `frontend\models\Visitor`.
 */
class VisitorSearch extends Visitor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Visitor_id', 'Contact_number', 'soft_del'], 'integer'],
            [['Visitor_name', 'Company_name', 'Email_Id', 'Purpose', 'PersonToMeet', 'Address', 'Govt_Id', 'Date'], 'safe'],
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
        $query = Visitor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
       $query->andFilterWhere([
        'soft_del' => $this->soft_del='0',
      ]);

        //if ((!$this->load($params)) && (!$this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
           // return $dataProvider;
       // }
       // if($this->load($params) && $this->validate())
      //  {
        // grid filtering conditions
      //  $query->andFilterWhere([
           // 'Visitor_id' => $this->Visitor_id,
            //'Contact_number' => $this->Contact_number,
            //'Date' => $this->Date,
       //     'soft_del' => $this->soft_del='0',
     //  ]);

       /* $query->andFilterWhere(['like', 'Visitor_name', $this->Visitor_name])
            ->andFilterWhere(['like', 'Company_name', $this->Company_name])
            ->andFilterWhere(['like', 'Email_Id', $this->Email_Id])
            ->andFilterWhere(['like', 'Purpose', $this->Purpose])
            ->andFilterWhere(['like', 'PersonToMeet', $this->PersonToMeet])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'Govt_Id', $this->Govt_Id]);*/
        // }
         return $dataProvider;
    }
}
