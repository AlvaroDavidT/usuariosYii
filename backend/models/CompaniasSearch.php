<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Companias;

/**
 * CompaniasSearch represents the model behind the search form about `backend\models\Companias`.
 */
class CompaniasSearch extends Companias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['compania_id'], 'integer'],
            [['compania_nombre', 'compania_email', 'compania_direccion','compania_creado_fecha', 'compania_estado'], 'safe'],
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
        $query = Companias::find();

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
            'compania_id' => $this->compania_id,
            'compania_creado_fecha' => $this->compania_creado_fecha,
        ]);

        $query->andFilterWhere(['like', 'compania_nombre', $this->compania_nombre])
            ->andFilterWhere(['like', 'compania_email', $this->compania_email])
            ->andFilterWhere(['like', 'compania_direccion', $this->compania_direccion])
            ->andFilterWhere(['like', 'compania_estado', $this->compania_estado]);

        return $dataProvider;
    }
}
