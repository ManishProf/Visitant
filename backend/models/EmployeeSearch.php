<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `backend\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['empid', 'empcontact', 'softdel'], 'integer'],
            [['empname', 'empemail', 'empdepartment', 'empdesignation'], 'string', 'max' => 255],
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
        $query = Employee::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 7 ],
                'sort' => [
        'defaultOrder' => [
            'empid' => SORT_DESC, 
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
            'softdel' => $this->softdel= 0,
        ]);

        $query->andFilterWhere(['like', 'empname', $this->empname])->andFilterWhere(['like', 'empcontact', $this->empcontact]);

        return $dataProvider;
    }
}
