<?php

namespace backend\models;

use backend\models\Paramxml;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ParamxmlSearch represents the model behind the search form about `backend\models\Paramxml`.
 */
class ParamxmlSearch extends Paramxml
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Estado'], 'integer'],
            [['Tag_xml', 'Descripcion'], 'safe'],
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
        $query = Paramxml::find();

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
            'Estado' => $this->Estado,
        ]);

        $query->andFilterWhere(['like', 'Tag_xml', $this->Tag_xml])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
