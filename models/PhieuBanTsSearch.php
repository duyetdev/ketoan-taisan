<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PhieuBanTs;

/**
 * PhieuBanTsSearch represents the model behind the search form about `app\models\PhieuBanTs`.
 */
class PhieuBanTsSearch extends PhieuBanTs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['so_pb', 'ma_kh', 'ma_tk', 'ma_kho'], 'integer'],
            [['ngay_ban', 'so_hoa_don', 'ngay_hoa_don', 'loai_hoa_don', 'thue_suat'], 'safe'],
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
        $query = PhieuBanTs::find();

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
            'so_pb' => $this->so_pb,
            'ma_kh' => $this->ma_kh,
            'ma_tk' => $this->ma_tk,
            'ma_kho' => $this->ma_kho,
        ]);

        $query->andFilterWhere(['like', 'ngay_ban', $this->ngay_ban])
            ->andFilterWhere(['like', 'so_hoa_don', $this->so_hoa_don])
            ->andFilterWhere(['like', 'ngay_hoa_don', $this->ngay_hoa_don])
            ->andFilterWhere(['like', 'loai_hoa_don', $this->loai_hoa_don])
            ->andFilterWhere(['like', 'thue_suat', $this->thue_suat]);

        return $dataProvider;
    }
}
