<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PhieuBanTs]].
 *
 * @see PhieuBanTs
 */
class PhieuBanTsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PhieuBanTs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PhieuBanTs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
