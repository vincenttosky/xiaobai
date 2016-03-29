<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Source;

/**
 * SourceSearch represents the model behind the search form about `backend\models\Source`.
 */
class SourceSearch extends Source
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['main', 'game', 'right1', 'right2', 'right3', 'right4', 'below1', 'below2', 'after1', 'after2', 'after3'], 'safe'],
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
        $query = Source::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['main' => $this->main])
            ->andFilterWhere(['game' => $this->game])
            ->andFilterWhere(['right1' => $this->right1])
            ->andFilterWhere(['right2' => $this->right2])
            ->andFilterWhere(['right3' => $this->right3])
            ->andFilterWhere(['right4' => $this->right4])
            ->andFilterWhere(['below1' => $this->below1])
            ->andFilterWhere(['below2' => $this->below2])
            ->andFilterWhere(['after1' => $this->after1])
            ->andFilterWhere(['after2' => $this->after2])
            ->andFilterWhere(['after3' => $this->after3]);

        return $dataProvider;
    }
}
