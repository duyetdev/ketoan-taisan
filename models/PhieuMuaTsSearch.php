<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PhieuMuaTs;

/**
 * PhieuMuaTsSearch represents the model behind the search form about `app\models\PhieuMuaTs`.
 */
class PhieuMuaTsSearch extends PhieuMuaTs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['so_pm', 'so_hoa_son', 'ma_kh', 'ma_tk_chinh', 'ma_kho', 'ma_nvc'], 'integer'],
            [['ngay_lap', 'ngay_su_dung', 'ngay_phat_hanh_hd', 'loai_hoa_don'], 'safe'],
            [['thue_suat'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PhieuMuaTs::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'so_pm' => $this->so_pm,
            'ngay_lap' => $this->ngay_lap,
            'ngay_su_dung' => $this->ngay_su_dung,
            'so_hoa_son' => $this->so_hoa_son,
            'ngay_phat_hanh_hd' => $this->ngay_phat_hanh_hd,
            'thue_suat' => $this->thue_suat,
            'ma_kh' => $this->ma_kh,
            'ma_tk_chinh' => $this->ma_tk_chinh,
            'ma_kho' => $this->ma_kho,
            'ma_nvc' => $this->ma_nvc,
        ]);

        $query->andFilterWhere(['like', 'loai_hoa_don', $this->loai_hoa_don]);

        return $dataProvider;
    }
}
