<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "visitanttransaction".
 *
 * @property integer $id
 * @property integer $visitor_id
 * @property string $purpose
 * @property integer $emp_id
 * @property string $emp_name
 * @property string $checkin_time
 * @property string $checkout_time
 */
class Visitanttransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visitanttransaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visitor_id', 'purpose', 'emp_id', 'emp_name'], 'required'],
            [['visitor_id', 'emp_id'], 'integer'],
            [['purpose'], 'string'],
            [['checkin_time', 'checkout_time'], 'safe'],
            [['emp_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'visitor_id' => 'Visitor ID',
            'purpose' => 'Purpose',
            'emp_id' => 'Person to Meet',
            'emp_name' => 'Emp Name',
            'checkin_time' => 'Checkin Time',
            'checkout_time' => 'Checkout Time',
        ];
    }

    
}
