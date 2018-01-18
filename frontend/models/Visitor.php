<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "visitor".
 *
 * @property integer $Visitor_id
 * @property string $Visitor_name
 * @property string $Company_name
 * @property integer $Contact_number
 * @property string $Email_Id
 * @property string $Purpose
 * @property string $PersonToMeet
 * @property string $Address
 * @property string $Govt_Id
 * @property string $Date
 * @property integer $soft_del
 */
class Visitor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visitor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Visitor_name', 'Company_name', 'Contact_number', 'Email_Id', 'Purpose', 'PersonToMeet', 'Address', 'Govt_Id'], 'required'],
            [['Contact_number', 'soft_del'], 'integer'],
            [['Date'],'date', 'format' => 'yyyy-MM-dd HH:mm:ss'],
            [['Visitor_name', 'Company_name', 'Email_Id', 'Purpose', 'PersonToMeet', 'Address'], 'string', 'max' => 255],
            [['Govt_Id'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Visitor_id' => 'Visitor ID',
            'Visitor_name' => 'Visitor Name',
            'Company_name' => 'Company Name',
            'Contact_number' => 'Contact Number',
            'Email_Id' => 'Email  ID',
            'Purpose' => 'Purpose',
            'PersonToMeet' => 'Person To Meet',
            'Address' => 'Address',
            'Govt_Id' => 'Govt  ID',
            'Date' => 'Date',
            'soft_del' => 'Soft Del',
        ];
    }
}
