<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Visittime]].
 *
 * @see Visittime
 */
class VisittimeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Visittime[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Visittime|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
