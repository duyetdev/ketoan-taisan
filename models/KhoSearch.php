<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kho;

/**
 * KhoSearch represents the model behind the search form about `app\models\Kho`.
 */
class KhoSearch extends Kho
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_kho'], 'integer'],
            [['ten_kho', 'dia_chi', 'sdt'], 'safe'],
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
        $query = Kho::find();

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
            'ma_kho' => $this->ma_kho,
        ]);

        $query->andFilterWhere(['like', 'ten_kho', $this->ten_kho])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
            ->andFilterWhere(['like', 'sdt', $this->sdt]);

        return $dataProvider;
    }
}
