<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pengaturan;

/**
 * PengaturanSearch represents the model behind the search form of `frontend\models\Pengaturan`.
 */
class PengaturanSearch extends Pengaturan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengaturan'], 'integer'],
            [['nama_aplikasi', 'logo'], 'safe'],
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
        $query = Pengaturan::find();

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
            'id_pengaturan' => $this->id_pengaturan,
        ]);

        $query->andFilterWhere(['like', 'nama_aplikasi', $this->nama_aplikasi])
            ->andFilterWhere(['like', 'logo', $this->logo]);

        return $dataProvider;
    }
}
