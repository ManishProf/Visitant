<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $empid
 * @property string $empname
 * @property string $empemail
 * @property integer $empcontact
 * @property string $empdepartment
 * @property string $empdesignation
 * @property integer $softdel
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['empname', 'empemail', 'empcontact', 'empdepartment', 'empdesignation'], 'required'],
            [['empcontact', 'softdel'], 'integer'],
            [['empcontact'],'integer','max' =>9999999999],
            ['empemail', 'email'],
            [['empname', 'empemail','empid','empdepartment', 'empdesignation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'empid' => 'Employee Id',
            'empname' => 'Employee Name',
            'empemail' => 'Employee Email',
            'empcontact' => 'Employee Contact Number',
            'empdepartment' => 'Employee Department',
            'empdesignation' => 'Employee Designation',
            'softdel' => 'Softdel',
        ];
    }

   
}
