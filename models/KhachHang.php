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
 * @property PhieuMuaTs[] $phieuMuaTs
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
            'ma_kh' => 'Mã khách hàng',
            'ten_kh' => 'Ten Kh',
            'dia_chi' => 'Dia Chi',
            'ma_so_thue' => 'Ma So Thue',
            'so_tai_khoan' => 'So Tai Khoan',
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
    public function getPhieuMuaTs()
    {
        return $this->hasMany(PhieuMuaTs::className(), ['ma_kh' => 'ma_kh']);
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
