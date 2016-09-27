<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ParametrizacionDatosEnvio;

/**
 * ParametrizacionDatosEnvioSearch represents the model behind the search form about `backend\models\ParametrizacionDatosEnvio`.
 */
class ParametrizacionDatosEnvioSearch extends ParametrizacionDatosEnvio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Tipo'], 'integer'],
            [['DatoXml', 'Tabla', 'Campo'], 'safe'],
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
        $query = ParametrizacionDatosEnvio::find();

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
            'Tipo' => $this->Tipo,
        ]);

        $query->andFilterWhere(['like', 'DatoXml', $this->DatoXml])
            ->andFilterWhere(['like', 'Tabla', $this->Tabla])
            ->andFilterWhere(['like', 'Campo', $this->Campo]);

        return $dataProvider;
    }
}
