<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tai_khoan".
 *
 * @property integer $ma_tk
 * @property string $ten_tk
 *
 * @property ChiTietPhieuBan[] $chiTietPhieuBans
 * @property ChiTietPhieuMua[] $chiTietPhieuMuas
 * @property PhieuBanTs[] $phieuBanTs
 * @property PhieuMuaTs[] $phieuMuaTs
 */
class TaiKhoan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tai_khoan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_tk'], 'required'],
            [['ma_tk'], 'integer'],
            [['ten_tk'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ma_tk' => 'Mã Tk',
            'ten_tk' => 'Tên Tk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChiTietPhieuBans()
    {
        return $this->hasMany(ChiTietPhieuBan::className(), ['tk_doi_ung' => 'ma_tk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChiTietPhieuMuas()
    {
        return $this->hasMany(ChiTietPhieuMua::className(), ['tk_doi_ung' => 'ma_tk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuBanTs()
    {
        return $this->hasMany(PhieuBanTs::className(), ['ma_tk' => 'ma_tk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieuMuaTs()
    {
        return $this->hasMany(PhieuMuaTs::className(), ['ma_tk_chinh' => 'ma_tk']);
    }

       /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getLoaiTSTaiKhoans() 
   { 
       return $this->hasMany(LoaiTSTaiKhoan::className(), ['ma_tk' => 'ma_tk']); 
   }

    /**
     * @inheritdoc
     * @return TaiKhoanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaiKhoanQuery(get_called_class());
    }
}
