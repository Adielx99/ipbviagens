<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inscricoes;

/**
 * InscricoesSearch represents the model behind the search form of `app\models\Inscricoes`.
 */
class InscricoesSearch extends Inscricoes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'viagens_Id', 'Pago', 'Id', 'Pagamentos_Id'], 'integer'],
            [['Data'], 'safe'],
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
        $query = Inscricoes::find();

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
            'user_id' => $this->user_id,
            'viagens_Id' => $this->viagens_Id,
            'Data' => $this->Data,
            'Pago' => $this->Pago,
            'Id' => $this->Id,
            'Pagamentos_Id' => $this->Pagamentos_Id,
        ]);

        return $dataProvider;
    }
}
