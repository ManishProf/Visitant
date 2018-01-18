<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Sendemail]].
 *
 * @see Sendemail
 */
class SendemailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Sendemail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sendemail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
