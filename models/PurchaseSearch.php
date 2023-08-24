<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Purchase;

/**
 * PurchaseSearch represents the model behind the search form of `app\models\Purchase`.
 */
class PurchaseSearch extends Purchase
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_product', 'id_delivery', 'id_card', 'id_status'], 'integer'],
            [['full_price', 'full_weight', 'created_at'], 'safe'],
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
        $query = Purchase::find();

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
            'id_user' => $this->id_user,
            'id_product' => $this->id_product,
            'id_delivery' => $this->id_delivery,
            'id_card' => $this->id_card,
            'created_at' => $this->created_at,
            'id_status' => $this->id_status,
        ]);

        $query->andFilterWhere(['like', 'full_price', $this->full_price])
            ->andFilterWhere(['like', 'full_weight', $this->full_weight]);

        return $dataProvider;
    }
}
