<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Campaign;

/**
 * CampaignSearch represents the model behind the search form of `backend\models\Campaign`.
 */
class CampaignSearch extends Campaign
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_title', 'c_image', 'c_description', 'c_start_date', 'c_end_date', 'c_video', 'c_description_long', 'c_created_at', 'c_location', 'c_status'], 'safe'],
            [['c_goal', 'c_id', 'c_author', 'c_cat_id', 'c_new_tag'], 'integer'],
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
        $query = Campaign::find();

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
            'c_start_date' => $this->c_start_date,
            'c_end_date' => $this->c_end_date,
            'c_goal' => $this->c_goal,
            'c_id' => $this->c_id,
            'c_author' => $this->c_author,
            'c_created_at' => $this->c_created_at,
            'c_cat_id' => $this->c_cat_id,
            'c_new_tag' => $this->c_new_tag,
            'c_status' => 'publish',
        ]);

        $query->andFilterWhere(['like', 'c_title', $this->c_title])
            ->andFilterWhere(['like', 'c_image', $this->c_image])
            ->andFilterWhere(['like', 'c_description', $this->c_description])
            ->andFilterWhere(['like', 'c_video', $this->c_video])
            ->andFilterWhere(['like', 'c_description_long', $this->c_description_long])
            ->andFilterWhere(['like', 'c_location', $this->c_location])
            ->andFilterWhere(['like', 'c_status', $this->c_status]);

        return $dataProvider;
    }
}
