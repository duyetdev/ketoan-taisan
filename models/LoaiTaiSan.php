<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Loai_tai_san".
 *
 * @property integer $ma_lts
 * @property string $ten_loai
 *
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
            [['ma_lts'], 'required'],
            [['ma_lts'], 'integer'],
            [['ten_loai'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ma_lts' => 'Mã loại tài sản',
            'ten_loai' => 'Tên loại',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaiSans()
    {
        return $this->hasMany(TaiSan::className(), ['ma_lts' => 'ma_lts']);
    }

    /**
     * @inheritdoc
     * @return LoaiTaiSanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoaiTaiSanQuery(get_called_class());
    }
}
