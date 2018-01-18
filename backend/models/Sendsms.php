<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sendsms".
 *
 * @property integer $id
 * @property string $phone_number
 * @property string $otp_number
 * @property integer $status
 */
class Sendsms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sendsms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status','contact_number'], 'integer'],
            [['contact_number'], 'integer', 'max'=> 9999999999],
            [['otp_number'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contact_number' => 'Contact Number',
            'otp_number' => 'Otp Number',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return SendsmsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SendsmsQuery(get_called_class());
    } 
}
