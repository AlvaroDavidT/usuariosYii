<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Departamentos;

/**
 * DepartamentosSearch represents the model behind the search form about `backend\models\Departamentos`.
 */
class DepartamentosSearch extends Departamentos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departamento_id', 'sucursales_sucursal_id', 'companias_compania_id'], 'integer'],
            [['departamento_nombre', 'departamento_creado_fecha', 'deparamento_estado'], 'safe'],
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
        $query = Departamentos::find();

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
            'departamento_id' => $this->departamento_id,
            'sucursales_sucursal_id' => $this->sucursales_sucursal_id,
            'companias_compania_id' => $this->companias_compania_id,
            'departamento_creado_fecha' => $this->departamento_creado_fecha,
        ]);

        $query->andFilterWhere(['like', 'departamento_nombre', $this->departamento_nombre])
            ->andFilterWhere(['like', 'deparamento_estado', $this->deparamento_estado]);

        return $dataProvider;
    }
}
