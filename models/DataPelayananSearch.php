<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataPelayanan;

/**
 * DataPelayananSearch represents the model behind the search form of `app\models\DataPelayanan`.
 */
class DataPelayananSearch extends DataPelayanan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kode_pelayanan'], 'integer'],
            [['inisial', 'nama', 'call_center', 'path_img', 'link', 'aktif'], 'safe'],
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
        $query = DataPelayanan::find();

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
            'id' => $this->id,
            'kode_pelayanan' => $this->kode_pelayanan,
        ]);

        $query->andFilterWhere(['like', 'inisial', $this->inisial])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'call_center', $this->call_center])
            ->andFilterWhere(['like', 'path_img', $this->path_img])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
