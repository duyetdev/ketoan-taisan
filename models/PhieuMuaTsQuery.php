<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PhieuMuaTs]].
 *
 * @see PhieuMuaTs
 */
class PhieuMuaTsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PhieuMuaTs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PhieuMuaTs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
