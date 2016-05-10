<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tai_san".
 *
 * @property integer $ma_ts
 * @property string $ten_ts
 * @property string $dvt
 * @property integer $nguyen_gia
 * @property integer $so_nam_khau_hao
 * @property integer $ma_lts
 *
 * @property ChiTietPhieuBan[] $chiTietPhieuBans
 * @property ChiTietPhieuMua $maTs
 * @property LoaiTaiSan $maLts
 */
class TaiSan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tai_san';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_ts'], 'required'],
            [['ma_ts', 'nguyen_gia', 'so_nam_khau_hao', 'ma_lts'], 'integer'],
            [['ten_ts', 'dvt'], 'string', 'max' => 45],
            [['ma_ts'], 'exist', 'skipOnError' => true, 'targetClass' => ChiTietPhieuMua::className(), 'targetAttribute' => ['ma_ts' => 'ma_ts']],
            [['ma_lts'], 'exist', 'skipOnError' => true, 'targetClass' => LoaiTaiSan::className(), 'targetAttribute' => ['ma_lts' => 'ma_lts']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ma_ts' => 'Ma Ts',
            'ten_ts' => 'Ten Ts',
            'dvt' => 'Dvt',
            'nguyen_gia' => 'Nguyen Gia',
            'so_nam_khau_hao' => 'So Nam Khau Hao',
            'ma_lts' => 'Ma Lts',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChiTietPhieuBans()
    {
        return $this->hasMany(ChiTietPhieuBan::className(), ['ma_ts' => 'ma_ts']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaTs()
    {
        return $this->hasOne(ChiTietPhieuMua::className(), ['ma_ts' => 'ma_ts']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaLts()
    {
        return $this->hasOne(LoaiTaiSan::className(), ['ma_lts' => 'ma_lts']);
    }

    /**
     * @inheritdoc
     * @return TaiSanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaiSanQuery(get_called_class());
    }
}
