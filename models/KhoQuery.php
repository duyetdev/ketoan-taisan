<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Kho]].
 *
 * @see Kho
 */
class KhoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Kho[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kho|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
