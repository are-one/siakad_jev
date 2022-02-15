<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Matakuliah;

/**
 * MatakuliahSearch represents the model behind the search form of `app\models\Matakuliah`.
 */
class MatakuliahSearch extends Matakuliah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_mk', 'mata_kuliah', 'jenis_mk'], 'safe'],
            [['semester', 'sks'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Matakuliah::find();

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
            'semester' => $this->semester,
            'sks' => $this->sks,
        ]);

        $query->andFilterWhere(['like', 'kode_mk', $this->kode_mk])
            ->andFilterWhere(['like', 'mata_kuliah', $this->mata_kuliah])
            ->andFilterWhere(['like', 'jenis_mk', $this->jenis_mk]);

        return $dataProvider;
    }
}