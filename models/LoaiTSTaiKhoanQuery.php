<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LoaiTSTaiKhoan]].
 *
 * @see LoaiTSTaiKhoan
 */
class LoaiTSTaiKhoanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LoaiTSTaiKhoan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LoaiTSTaiKhoan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
