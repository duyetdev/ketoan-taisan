<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KhachHang;

/**
 * KhachHangSearch represents the model behind the search form about `app\models\KhachHang`.
 */
class KhachHangSearch extends KhachHang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_kh'], 'integer'],
            [['ten_kh', 'dia_chi', 'ma_so_thue', 'so_tai_khoan'], 'safe'],
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
        $query = KhachHang::find();

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
            'ma_kh' => $this->ma_kh,
        ]);

        $query->andFilterWhere(['like', 'ten_kh', $this->ten_kh])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
            ->andFilterWhere(['like', 'ma_so_thue', $this->ma_so_thue])
            ->andFilterWhere(['like', 'so_tai_khoan', $this->so_tai_khoan]);

        return $dataProvider;
    }
}
