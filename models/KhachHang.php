<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Khach_hang".
 *
 * @property integer $ma_kh
 * @property string $ten_kh
 * @property string $dia_chi
 * @property string $ma_so_thue
 * @property string $so_tai_khoan
 *
 * @property PhieuBanTs[] $phieuBanTs
 * @property PhieuBanTs[] $phieuBanTs0
 * @property PhieuMuaTs[] $phieuMuaTs
 * @property PhieuMuaTs[] $phieuMuaTs0
 */
class KhachHang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Khach_hang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_kh'], 'required'],
            [['ma_kh'], 'integer'],
            [['ten_kh', 'dia_chi', 'ma_so_thue', 'so_tai_khoan'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ma_kh' => 'Mã KH',
            'ten_kh' => 'Tên khách hàng',
            'dia_chi' => 'Địa chỉ',
            'ma_so_thue' => 'Mã số thuế',
            'so_tai_khoan' => 'Số tài khoản',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuBanTs()
    {
        return $this->hasMany(PhieuBanTs::className(), ['ma_kh' => 'ma_kh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuBanTs0()
    {
        return $this->hasMany(PhieuBanTs::className(), ['ma_nvc' => 'ma_kh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuMuaTs()
    {
        return $this->hasMany(PhieuMuaTs::className(), ['ma_kh' => 'ma_kh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuMuaTs0()
    {
        return $this->hasMany(PhieuMuaTs::className(), ['ma_nvc' => 'ma_kh']);
    }

    /**
     * @inheritdoc
     * @return KhachHangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KhachHangQuery(get_called_class());
    }
}
