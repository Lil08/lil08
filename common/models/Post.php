<?php

namespace common\models;

use andrewdanilov\behaviors\DateBehavior;
use andrewdanilov\behaviors\TagBehavior;
use common\models\Category;

use DateTime;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $text
 * @property string|null $createdAt
 * @property int|null $active
 * @property string|null $image
 * @property string|null $code
 * @property string|null $category_id
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $keywords
 * @property $tags
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['createdAt'], 'safe'],
            [['category_id'], 'number'],
            [['active'], 'boolean'],
            [['title', 'image', 'code','meta_title','meta_description','keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'code' => 'Код',
            'text' => 'Текст',
            'createdAt' => 'Дата создания',
            'active' => 'Активность',
            'image' => 'Изображение',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::classname(), ['id' => 'tagId'])
            ->viaTable('postTag', ['postId' => 'id']);
    }

    public function getSelectedTags()
    {
        $selectedIds = $this->getTags()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selectedIds, 'id');
    }

    public function getCommnetsCount()
    {
        return Comments::find()->where(['active' => true])->andWhere(['post_id' => $this->id])->count();
    }

    public function getUrl()
    {
        $category = Category::find()->where(['id' => $this->category_id])->one();
        return '/blog/' . $category->code . '/' . $this->code;
    }

    public function beforeSave($insert)
    {
        if (!$this->code) {
            $this->code = Inflector::slug($this->title);
        }
        if (!$this->createdAt || !strtotime($this->createdAt)) {
            $this->createdAt = date('d.m.Y');
        }

        $this->createdAt = date('Y-m-d', strtotime($this->createdAt));

        return parent::beforeSave($insert);
    }

    public function saveTags($tags)
    {
        if (is_array($tags)) {
            PostTag::deleteAll(['postId' => $this->id]);
            foreach ($tags as $tag) {
                $tag = Tag::findOne($tag);
                $this->link('tags', $tag);
            }
        }
    }
}
