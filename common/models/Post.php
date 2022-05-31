<?php

namespace common\models;

use common\models\Category;
use Yii;
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
            [['title', 'image', 'code'], 'string', 'max' => 255],
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

    public function beforeSave($insert)
    {
        if (!$this->code) {
            $this->code = Inflector::slug($this->title);
        }
        return parent::beforeSave($insert);
    }
}
