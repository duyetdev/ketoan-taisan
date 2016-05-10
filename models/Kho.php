<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Kho".
 *
 * @property integer $ma_kho
 * @property string $ten_kho
 * @property string $dia_chi
 * @property string $sdt
 *
 * @property PhieuBanTs[] $phieuBanTs
 * @property PhieuMuaTs[] $phieuMuaTs
 */
class Kho extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Kho';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_kho'], 'required'],
            [['ma_kho'], 'integer'],
            [['ten_kho', 'dia_chi', 'sdt'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ma_kho' => 'Ma Kho',
            'ten_kho' => 'Ten Kho',
            'dia_chi' => 'Dia Chi',
            'sdt' => 'Sdt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuBanTs()
    {
        return $this->hasMany(PhieuBanTs::className(), ['ma_kho' => 'ma_kho']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuMuaTs()
    {
        return $this->hasMany(PhieuMuaTs::className(), ['ma_kho' => 'ma_kho']);
    }

    /**
     * @inheritdoc
     * @return KhoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KhoQuery(get_called_class());
    }
}
