<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DarbuotojaiForm;

/**
 * Darbuotojais represents the model behind the search form of `app\models\DarbuotojaiForm`.
 */
class Darbuotojais extends DarbuotojaiForm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'stazas', 'lygis', 'inviter'], 'integer'],
            [['vardas', 'pavarde', 'pareigos', 'telefonas', 'email'], 'safe'],
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
        $query = DarbuotojaiForm::find();

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
            'stazas' => $this->stazas,
            'lygis' => $this->lygis,
            'inviter' => $this->inviter,
        ]);

        $query->andFilterWhere(['like', 'vardas', $this->vardas])
            ->andFilterWhere(['like', 'pavarde', $this->pavarde])
            ->andFilterWhere(['like', 'pareigos', $this->pareigos])
            ->andFilterWhere(['like', 'telefonas', $this->telefonas])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
