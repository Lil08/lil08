<?php
namespace backend\models;

use andrewdanilov\helpers\NestedCategoryHelper;
use common\models\Post;
use yii\data\ActiveDataProvider;


class PostSearch extends Post
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['code', 'title', 'createdAt'], 'string'],
        ];
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
        $query = Post::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
        ]);

        if ($this->category_id) {
        	// search in category and subcategories
        	$childrenIds = NestedCategoryHelper::getChildrenIds(Category::find(), $this->category_id);
	        $childrenIds[] = $this->category_id;
        	$query->andWhere(['category_id' => $childrenIds]);
        }

	    $published_at_search = implode('-', array_reverse(explode('.', $this->createdAt)));

	    $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'createdAt', $published_at_search]);

        return $dataProvider;
    }
}
