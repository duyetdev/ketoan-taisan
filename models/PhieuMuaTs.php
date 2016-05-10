<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Phieu_mua_ts".
 *
 * @property integer $so_pm
 * @property string $ngay_lap
 * @property string $ngay_su_dung
 * @property integer $so_hoa_son
 * @property string $ngay_phat_hanh_hd
 * @property string $loai_hoa_don
 * @property double $thue_suat
 * @property integer $ma_kh
 * @property integer $ma_tk_chinh
 * @property integer $ma_kho
 * @property integer $ma_nvc
 *
 * @property ChiTietPhieuMua $soPm
 * @property KhachHang $maKh
 * @property TaiKhoan $maTkChinh
 * @property Kho $maKho
 * @property KhachHang $maNvc
 */
class PhieuMuaTs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Phieu_mua_ts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['so_pm', 'ma_nvc', 'so_phieu'], 'required'],
            [['so_pm', 'so_hoa_son', 'ma_kh', 'ma_tk_chinh', 'ma_kho', 'ma_nvc'], 'integer'],
            [['ngay_lap', 'ngay_su_dung', 'ngay_phat_hanh_hd'], 'safe'],
            [['thue_suat'], 'number'],
            [['loai_hoa_don'], 'string', 'max' => 45],
            [['so_phieu'], 'string', 'max' => 50],
            [['so_pm'], 'exist', 'skipOnError' => true, 'targetClass' => ChiTietPhieuMua::className(), 'targetAttribute' => ['so_pm' => 'so_pm']],
            [['ma_kh'], 'exist', 'skipOnError' => true, 'targetClass' => KhachHang::className(), 'targetAttribute' => ['ma_kh' => 'ma_kh']],
            [['ma_tk_chinh'], 'exist', 'skipOnError' => true, 'targetClass' => TaiKhoan::className(), 'targetAttribute' => ['ma_tk_chinh' => 'ma_tk']],
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
            'so_pm' => 'Số phiếu',
            'so_phieu' => 'Số phiếu',
            'ngay_lap' => 'Ngay Lap',
            'ngay_su_dung' => 'Ngay Su Dung',
            'so_hoa_son' => 'Số hóa đơn',
            'ngay_phat_hanh_hd' => 'Ngay Phat Hanh Hd',
            'loai_hoa_don' => 'Loai Hoa Don',
            'thue_suat' => 'Thue Suat',
            'ma_kh' => 'Ma Kh',
            'ma_tk_chinh' => 'Ma Tk Chinh',
            'ma_kho' => 'Ma Kho',
            'ma_nvc' => 'Ma Nvc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoPm()
    {
        return $this->hasOne(ChiTietPhieuMua::className(), ['so_pm' => 'so_pm']);
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
    public function getMaTkChinh()
    {
        return $this->hasOne(TaiKhoan::className(), ['ma_tk' => 'ma_tk_chinh']);
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

    /**
     * @inheritdoc
     * @return PhieuMuaTsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PhieuMuaTsQuery(get_called_class());
    }

    public static function lastId()
    {
        return 1;
    }

    public function getSoPhieu() {
        // return 'NTSA' . str_pad($last_id, 5, '0', STR_PAD_LEFT) . '-' . date('m-y')
    }
}
