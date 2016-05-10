<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LoaiTaiSan;

/**
 * LoaiTaiSanSearch represents the model behind the search form about `app\models\LoaiTaiSan`.
 */
class LoaiTaiSanSearch extends LoaiTaiSan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_lts'], 'integer'],
            [['ten_loai'], 'safe'],
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
        $query = LoaiTaiSan::find();

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
            'ma_lts' => $this->ma_lts,
        ]);

        $query->andFilterWhere(['like', 'ten_loai', $this->ten_loai]);

        return $dataProvider;
    }
}
