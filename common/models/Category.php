<?php

namespace common\models;

use Yii;
use yii\helpers\Inflector;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $code
 * @property string|null $text
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['title', 'code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'code' => 'Code',
            'text' => 'Text',
        ];
    }
    public function getPages()
    {
        return $this->hasMany(Post::class, ['category_id' => 'id']);
    }

    public static function getCategoriesList()
    {
        return static::find()->select(['title', 'id'])->orderBy(['order' => SORT_ASC, 'id' => SORT_ASC])->indexBy('id')->column();
    }

    public function beforeSave($insert)
    {
        if (!$this->code) {
            $this->code = Inflector::slug($this->title);
        }
        return parent::beforeSave($insert);
    }

}
