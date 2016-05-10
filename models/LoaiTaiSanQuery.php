<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LoaiTaiSan]].
 *
 * @see LoaiTaiSan
 */
class LoaiTaiSanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LoaiTaiSan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LoaiTaiSan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
