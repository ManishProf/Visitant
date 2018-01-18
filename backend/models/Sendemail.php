<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sendemail".
 *
 * @property integer $id
 * @property string $email
 * @property integer $otpnumber
 * @property integer $status
 */
class Sendemail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sendemail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'otpnumber'], 'required'],
            [['otpnumber', 'status'], 'integer'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email ID',
            'otpnumber' => 'OTP NUMBER',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return SendemailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SendemailQuery(get_called_class());
    }


       /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email,$mes)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom(['funcrelat@gmail.com' =>'ADMIN'])
            ->setSubject('Verification Code')
            ->setTextBody($mes)
            ->send();
    }
}
