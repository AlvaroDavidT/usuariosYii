<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sucursales;

/**
 * SucursalessSearch represents the model behind the search form about `backend\models\Sucursales`.
 */
class SucursalessSearch extends Sucursales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sucursal_id'], 'integer'],
            [['sucursal_nombre','companias_compania_id', 'sucursal_direccion', 'sucursal_creado_fecha', 'sucursal_estado'], 'safe'],
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
        $query = Sucursales::find();

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
            'sucursal_id' => $this->sucursal_id,
            'companias_compania_id' => $this->companias_compania_id,
            'sucursal_creado_fecha' => $this->sucursal_creado_fecha,
        ]);

        $query->andFilterWhere(['like', 'sucursal_nombre', $this->sucursal_nombre])
            ->andFilterWhere(['like', 'sucursal_direccion', $this->sucursal_direccion])
            ->andFilterWhere(['like', 'sucursal_estado', $this->sucursal_estado]);

        return $dataProvider;
    }
}
