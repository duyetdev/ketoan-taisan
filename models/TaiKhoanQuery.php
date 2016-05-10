<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TaiKhoan]].
 *
 * @see TaiKhoan
 */
class TaiKhoanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TaiKhoan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TaiKhoan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
