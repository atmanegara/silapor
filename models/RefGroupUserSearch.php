<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RefGroupUser;

/**
 * RefGroupUserSearch represents the model behind the search form of `app\models\RefGroupUser`.
 */
class RefGroupUserSearch extends RefGroupUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nm_group_user', 'ket', 'path_img', 'icon_map', 'jam_tgl'], 'safe'],
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
        $query = RefGroupUser::find();

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
            'jam_tgl' => $this->jam_tgl,
        ]);

        $query->andFilterWhere(['like', 'nm_group_user', $this->nm_group_user])
            ->andFilterWhere(['like', 'ket', $this->ket])
            ->andFilterWhere(['like', 'path_img', $this->path_img])
            ->andFilterWhere(['like', 'icon_map', $this->icon_map]);

        return $dataProvider;
    }
}
