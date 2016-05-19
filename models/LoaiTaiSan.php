<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Loai_tai_san".
 *
 * @property integer $ma_lts
 * @property string $ten_loai
 * @property integer $ma_tk
 *
 * @property TaiKhoan $maTk
 * @property TaiSan[] $taiSans
 */
class LoaiTaiSan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Loai_tai_san';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_tk'], 'required'],
            [['ma_tk'], 'integer'],
            [['ten_loai'], 'string', 'max' => 45],
            [['ma_tk'], 'exist', 'skipOnError' => true, 'targetClass' => TaiKhoan::className(), 'targetAttribute' => ['ma_tk' => 'ma_tk']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ma_lts' => 'Ma Lts',
            'ten_loai' => 'Ten Loai',
            'ma_tk' => 'Ma Tk',
        ];
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
    public function getTaiSans()
    {
        return $this->hasMany(TaiSan::className(), ['ma_lts' => 'ma_lts']);
    }
}
