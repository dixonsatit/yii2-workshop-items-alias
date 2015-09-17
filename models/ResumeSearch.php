<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resume;

/**
 * ResumeSearch represents the model behind the search form about `app\models\Resume`.
 */
class ResumeSearch extends Resume
{
  public $fullName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'education_level', 'marital_status', 'sex'], 'integer'],
            [['title', 'firstname', 'lastname', 'skill','fullName'], 'safe'],
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
        $query = Resume::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['fullName'] = [
           'asc' => ['firstname' => SORT_ASC, 'lastname' => SORT_ASC],
           'desc' => ['firstname' => SORT_DESC, 'lastname' => SORT_DESC],
           'default' => SORT_ASC
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'education_level' => $this->education_level,
            'marital_status' => $this->marital_status,
            'sex' => $this->sex,
        ]);

        // filter by person full name
         $query->andWhere('firstname LIKE "%' . $this->fullName . '%" ' .
             'OR lastname LIKE "%' . $this->fullName . '%"'
         );
         $query->andWhere("DATE_FORMAT(FROM_UNIXTIME(created_at), '%Y-%m-%d') = '$this->created_at' ");



        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'skill', $this->skill]);

        return $dataProvider;
    }
}
