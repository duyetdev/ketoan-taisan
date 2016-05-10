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
 *
 * @property ChiTietPhieuMua $soPm
 * @property KhachHang $maKh
 * @property TaiKhoan $maTkChinh
 * @property Kho $maKho
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
            [['so_pm'], 'required'],
            [['so_pm', 'so_hoa_son', 'ma_kh', 'ma_tk_chinh', 'ma_kho'], 'integer'],
            [['ngay_lap', 'ngay_su_dung', 'ngay_phat_hanh_hd'], 'safe'],
            [['thue_suat'], 'number'],
            [['loai_hoa_don'], 'string', 'max' => 45],
            [['so_pm'], 'exist', 'skipOnError' => true, 'targetClass' => ChiTietPhieuMua::className(), 'targetAttribute' => ['so_pm' => 'so_pm']],
            [['ma_kh'], 'exist', 'skipOnError' => true, 'targetClass' => KhachHang::className(), 'targetAttribute' => ['ma_kh' => 'ma_kh']],
            [['ma_tk_chinh'], 'exist', 'skipOnError' => true, 'targetClass' => TaiKhoan::className(), 'targetAttribute' => ['ma_tk_chinh' => 'ma_tk']],
            [['ma_kho'], 'exist', 'skipOnError' => true, 'targetClass' => Kho::className(), 'targetAttribute' => ['ma_kho' => 'ma_kho']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'so_pm' => 'So Pm',
            'ngay_lap' => 'Ngay Lap',
            'ngay_su_dung' => 'Ngay Su Dung',
            'so_hoa_son' => 'So Hoa Son',
            'ngay_phat_hanh_hd' => 'Ngay Phat Hanh Hd',
            'loai_hoa_don' => 'Loai Hoa Don',
            'thue_suat' => 'Thue Suat',
            'ma_kh' => 'Ma Kh',
            'ma_tk_chinh' => 'Ma Tk Chinh',
            'ma_kho' => 'Ma Kho',
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
     * @inheritdoc
     * @return PhieuMuaTsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PhieuMuaTsQuery(get_called_class());
    }
}
