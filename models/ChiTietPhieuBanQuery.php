<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ChiTietPhieuBan]].
 *
 * @see ChiTietPhieuBan
 */
class ChiTietPhieuBanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ChiTietPhieuBan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ChiTietPhieuBan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
