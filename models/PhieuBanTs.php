<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Phieu_ban_ts".
 *
 * @property integer $so_pb
 * @property string $ngay_ban
 * @property string $so_hoa_don
 * @property string $ngay_hoa_don
 * @property string $loai_hoa_don
 * @property string $thue_suat
 * @property integer $ma_kh
 * @property integer $ma_tk
 * @property integer $ma_kho
 *
 * @property ChiTietPhieuBan $chiTietPhieuBan
 * @property KhachHang $maKh
 * @property TaiKhoan $maTk
 * @property Kho $maKho
 */
class PhieuBanTs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Phieu_ban_ts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['so_pb'], 'required'],
            [['so_pb', 'ma_kh', 'ma_tk', 'ma_kho'], 'integer'],
            [['ngay_ban', 'so_hoa_don', 'ngay_hoa_don', 'loai_hoa_don', 'thue_suat'], 'string', 'max' => 45],
            [['ma_kh'], 'exist', 'skipOnError' => true, 'targetClass' => KhachHang::className(), 'targetAttribute' => ['ma_kh' => 'ma_kh']],
            [['ma_tk'], 'exist', 'skipOnError' => true, 'targetClass' => TaiKhoan::className(), 'targetAttribute' => ['ma_tk' => 'ma_tk']],
            [['ma_kho'], 'exist', 'skipOnError' => true, 'targetClass' => Kho::className(), 'targetAttribute' => ['ma_kho' => 'ma_kho']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'so_pb' => 'So Pb',
            'ngay_ban' => 'Ngay Ban',
            'so_hoa_don' => 'So Hoa Don',
            'ngay_hoa_don' => 'Ngay Hoa Don',
            'loai_hoa_don' => 'Loai Hoa Don',
            'thue_suat' => 'Thue Suat',
            'ma_kh' => 'Ma Kh',
            'ma_tk' => 'Ma Tk',
            'ma_kho' => 'Ma Kho',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChiTietPhieuBan()
    {
        return $this->hasOne(ChiTietPhieuBan::className(), ['so_pb' => 'so_pb']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaKh()
    {
        return $this->hasOne(KhachHang::className(), ['ma_kh' => 'ma_kh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaTk()
    {
        return $this->hasOne(TaiKhoan::className(), ['ma_tk' => 'ma_tk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaKho()
    {
        return $this->hasOne(Kho::className(), ['ma_kho' => 'ma_kho']);
    }

    /**
     * @inheritdoc
     * @return PhieuBanTsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PhieuBanTsQuery(get_called_class());
    }
}
