<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Name;

/**
 * NameScarch represents the model behind the search form about `app\models\Name`.
 */
class NameScarch extends Name {
public $q;
    public $positionname;
    public $positiontypename;
    public $depname;

//    public $fullName;
    public function rules() {
        return [
            [['code', 'name', 'update_datetime', 'status', 'positionname', 'positiontypename', 'depname','q'], 'safe'],
            [['position_type_id', 'position_id', 'dep_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params) {
        $query = Name::find();
        $query->joinWith(['position']);
        $query->joinWith(['positiontype']);
        $query->joinWith(['dep']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['positionname'] = [
            'asc' => ['position.position' => SORT_ASC],
            'desc' => ['position.position' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['positiontypename'] = [
            'asc' => ['position_type.position_type' => SORT_ASC],
            'desc' => ['position_type.position_type' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['depname'] = [
            'asc' => ['dep.dep_name' => SORT_ASC],
            'desc' => ['dep.dep_name' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'position_type_id' => $this->position_type_id,
            'position_id' => $this->position_id,
            'dep_id' => $this->dep_id,
            'update_datetime' => $this->update_datetime,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'status', $this->status]);
        $query->orFilterWhere(['like', 'name', $this->q]);
        $query->orFilterWhere(['like', 'position.position', $this->q]);
        $query->orFilterWhere(['like', 'position_type.position_type', $this->q]);
        $query->orFilterWhere(['like', 'dep.dep_name', $this->q]);
        return $dataProvider;
    }

}
