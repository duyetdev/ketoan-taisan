<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Chi_tiet_phieu_ban".
 *
 * @property integer $so_pb
 * @property integer $ma_ts
 * @property integer $tk_doi_ung
 * @property double $so_tien
 *
 * @property PhieuBanTs $soPb
 * @property TaiSan $maTs
 * @property TaiKhoan $tkDoiUng
 */
class ChiTietPhieuBan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Chi_tiet_phieu_ban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['so_pb'], 'required'],
            [['so_pb', 'ma_ts', 'tk_doi_ung'], 'integer'],
            [['so_tien'], 'number'],
            [['so_pb'], 'exist', 'skipOnError' => true, 'targetClass' => PhieuBanTs::className(), 'targetAttribute' => ['so_pb' => 'so_pb']],
            [['ma_ts'], 'exist', 'skipOnError' => true, 'targetClass' => TaiSan::className(), 'targetAttribute' => ['ma_ts' => 'ma_ts']],
            [['tk_doi_ung'], 'exist', 'skipOnError' => true, 'targetClass' => TaiKhoan::className(), 'targetAttribute' => ['tk_doi_ung' => 'ma_tk']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'so_pb' => 'So Pb',
            'ma_ts' => 'Ma Ts',
            'tk_doi_ung' => 'Tk Doi Ung',
            'so_tien' => 'So Tien',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoPb()
    {
        return $this->hasOne(PhieuBanTs::className(), ['so_pb' => 'so_pb']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaTs()
    {
        return $this->hasOne(TaiSan::className(), ['ma_ts' => 'ma_ts']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkDoiUng()
    {
        return $this->hasOne(TaiKhoan::className(), ['ma_tk' => 'tk_doi_ung']);
    }

    /**
     * @inheritdoc
     * @return ChiTietPhieuBanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChiTietPhieuBanQuery(get_called_class());
    }
}
