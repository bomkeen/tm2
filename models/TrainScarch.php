<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Train;

/**
 * TrainScarch represents the model behind the search form about `app\models\Train`.
 */
class TrainScarch extends Train
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['train_id', 'name_id', 'day_sum', 'place_type', 'budget_hos', 'regist_price', 'allowance_price', 'travel_price', 'hotel_price', 'budget_organize', 'train_type', 'devalob_type'], 'integer'],
            [['date_go', 'date_back', 'activity', 'place', 'organize', 'other', 'date_update'], 'safe'],
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
        $query = Train::find();

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
            'train_id' => $this->train_id,
            'name_id' => $this->name_id,
            'date_go' => $this->date_go,
            'date_back' => $this->date_back,
            'day_sum' => $this->day_sum,
            'place_type' => $this->place_type,
            'budget_hos' => $this->budget_hos,
            'regist_price' => $this->regist_price,
            'allowance_price' => $this->allowance_price,
            'travel_price' => $this->travel_price,
            'hotel_price' => $this->hotel_price,
            'budget_organize' => $this->budget_organize,
            'train_type' => $this->train_type,
            'devalob_type' => $this->devalob_type,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'activity', $this->activity])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'organize', $this->organize])
            ->andFilterWhere(['like', 'other', $this->other]);

        return $dataProvider;
    }
}
