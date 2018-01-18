<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "visittime".
 *
 * @property integer $vtid
 * @property integer $visitorid
 * @property string $visitintime
 * @property string $visitouttime
 */
class Visittime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visittime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visitorid'], 'required'],
            [['visitorid'], 'integer'],
            [['visitintime', 'visitouttime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vtid' => 'Vtid',
            'visitorid' => 'Visitorid',
            'visitintime' => 'Visitintime',
            'visitouttime' => 'Visitouttime',
        ];
    }

    /**
     * @inheritdoc
     * @return VisittimeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VisittimeQuery(get_called_class());
    }
}
