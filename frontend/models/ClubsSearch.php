<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clubs;

/**
 * ClubsSearch represents the model behind the search form of `app\models\Clubs`.
 */
class ClubsSearch extends Clubs
{
    /**
     * {@inheritdoc}
     */
    public $showDeleted;

    public function rules()
    {
        return [
            [['name'], 'safe'],
            [['showDeleted'], 'boolean'],
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
        $query = Clubs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name]);

        if ($this->showDeleted) {
            $query->andWhere(['not', ['deleted_at' => null]]);
        } else {
            $query->andWhere(['deleted_at' => null]);
        }

        // ... other filters

        return $dataProvider;
    }
}