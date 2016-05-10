<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ChiTietPhieuMua]].
 *
 * @see ChiTietPhieuMua
 */
class ChiTietPhieuMuaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ChiTietPhieuMua[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ChiTietPhieuMua|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
