<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KhachHang]].
 *
 * @see KhachHang
 */
class KhachHangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return KhachHang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return KhachHang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
