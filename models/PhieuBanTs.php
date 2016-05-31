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
 * @property integer $ma_nvc
 * @property string $so_phieu
 * @property string $ly_do
 *
 * @property ChiTietPhieuBan $chiTietPhieuBan
 * @property KhachHang $maKh
 * @property TaiKhoan $maTk
 * @property Kho $maKho
 * @property KhachHang $maNvc
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
            [['ma_kh', 'ma_tk', 'ma_kho', 'ma_nvc'], 'integer'],
            [['ma_nvc', 'so_phieu', 'ly_do'], 'required'],
            [['ngay_ban', 'so_hoa_don', 'ngay_hoa_don', 'loai_hoa_don', 'thue_suat'], 'string', 'max' => 45],
            [['so_phieu'], 'string', 'max' => 50],
            [['ly_do'], 'string', 'max' => 255],
            [['so_pb'], 'exist', 'skipOnError' => true, 'targetClass' => ChiTietPhieuBan::className(), 'targetAttribute' => ['so_pb' => 'so_pb']],
            [['ma_kh'], 'exist', 'skipOnError' => true, 'targetClass' => KhachHang::className(), 'targetAttribute' => ['ma_kh' => 'ma_kh']],
            [['ma_tk'], 'exist', 'skipOnError' => true, 'targetClass' => TaiKhoan::className(), 'targetAttribute' => ['ma_tk' => 'ma_tk']],
            [['ma_kho'], 'exist', 'skipOnError' => true, 'targetClass' => Kho::className(), 'targetAttribute' => ['ma_kho' => 'ma_kho']],
            [['ma_nvc'], 'exist', 'skipOnError' => true, 'targetClass' => KhachHang::className(), 'targetAttribute' => ['ma_nvc' => 'ma_kh']],
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
            'loai_hoa_don' => 'Loại hóa đơn',
            'thue_suat' => 'Thue Suat',
            'ma_kh' => 'Ma Kh',
            'ma_tk' => 'Tài khoản',
            'ma_kho' => 'Ma Kho',
            'ma_nvc' => 'Ma Nvc',
            'so_phieu' => 'Số phiếu',
            'ly_do' => 'Lý do',
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
     * @return \yii\db\ActiveQuery
     */
    public function getMaNvc()
    {
        return $this->hasOne(KhachHang::className(), ['ma_kh' => 'ma_nvc']);
    }

    public static function lastId()
    {
        return rand(1,999);
    }
}
