<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TaiSan]].
 *
 * @see TaiSan
 */
class TaiSanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TaiSan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TaiSan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
