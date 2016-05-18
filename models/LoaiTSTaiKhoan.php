<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "LoaiTS_TaiKhoan".
 *
 * @property integer $ma_lts
 * @property integer $ma_tk
 *
 * @property TaiKhoan $maTk
 * @property LoaiTaiSan $maLts
 */
class LoaiTSTaiKhoan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'LoaiTS_TaiKhoan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_lts', 'ma_tk'], 'required'],
            [['ma_lts', 'ma_tk'], 'integer'],
            [['ma_tk'], 'exist', 'skipOnError' => true, 'targetClass' => TaiKhoan::className(), 'targetAttribute' => ['ma_tk' => 'ma_tk']],
            [['ma_lts'], 'exist', 'skipOnError' => true, 'targetClass' => LoaiTaiSan::className(), 'targetAttribute' => ['ma_lts' => 'ma_lts']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ma_lts' => 'Ma Lts',
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
    public function getMaLts()
    {
        return $this->hasOne(LoaiTaiSan::className(), ['ma_lts' => 'ma_lts']);
    }

    /**
     * @inheritdoc
     * @return LoaiTSTaiKhoanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoaiTSTaiKhoanQuery(get_called_class());
    }
}
