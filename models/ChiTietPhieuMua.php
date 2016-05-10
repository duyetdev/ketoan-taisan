<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Chi_tiet_phieu_mua".
 *
 * @property integer $so_pm
 * @property integer $ma_ts
 * @property integer $tk_doi_ung
 * @property double $so_tien
 *
 * @property TaiKhoan $tkDoiUng
 * @property PhieuMuaTs $phieuMuaTs
 * @property TaiSan $taiSan
 */
class ChiTietPhieuMua extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Chi_tiet_phieu_mua';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['so_pm'], 'required'],
            [['so_pm', 'ma_ts', 'tk_doi_ung'], 'integer'],
            [['so_tien'], 'number'],
            [['tk_doi_ung'], 'exist', 'skipOnError' => true, 'targetClass' => TaiKhoan::className(), 'targetAttribute' => ['tk_doi_ung' => 'ma_tk']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'so_pm' => 'So Pm',
            'ma_ts' => 'Ma Ts',
            'tk_doi_ung' => 'Tk Doi Ung',
            'so_tien' => 'So Tien',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkDoiUng()
    {
        return $this->hasOne(TaiKhoan::className(), ['ma_tk' => 'tk_doi_ung']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuMuaTs()
    {
        return $this->hasOne(PhieuMuaTs::className(), ['so_pm' => 'so_pm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaiSan()
    {
        return $this->hasOne(TaiSan::className(), ['ma_ts' => 'ma_ts']);
    }

    /**
     * @inheritdoc
     * @return ChiTietPhieuMuaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChiTietPhieuMuaQuery(get_called_class());
    }
}
