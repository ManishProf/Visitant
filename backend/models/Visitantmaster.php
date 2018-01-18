<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "visitantmaster".
 *
 * @property integer $visitor_id
 * @property string $visitor_name
 * @property string $company_name
 * @property string $address
 * @property string $govt_idtype
 * @property string $govt_idvalue
 * @property string $status
 * @property integer $del
 */
class Visitantmaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visitantmaster';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visitor_name', 'company_name','contact_number','address', 'govt_idtype', 'govt_idvalue'], 'required'],
            [['del','contact_number'], 'integer'],
            [['address'], 'string'],
            [['visitor_id'], 'safe'],
            [['visitor_name', 'company_name', 'govt_idtype', 'govt_idvalue', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visitor_id' => 'Visitor ID',
            'visitor_name' => 'Visitor Name',
            'company_name' => 'Company Name',
            'contact_number' => 'Contact Number',
            'address' => 'Address',
            'govt_idtype' => 'Govt Idtype',
            'govt_idvalue' => 'Govt Idvalue',
            'status' => 'Status',
            'del' => 'Del',
        ];
    }
   
   public function getVisitanttransaction()
    {
        return $this->hasOne(Visitanttransaction::className(),['visitor_id'=>'visitor_id'])->orderBy(['id'=>SORT_DESC]);
    }

  
   
}
