<?php
namespace common\models;

use yii\db\ActiveRecord;

class PostTag extends ActiveRecord
{
    public static function tableName()
    {
        return 'postTag';
    }

    public function rules()
    {
        return [
            [['postId', 'tagId'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'postId' => 'Post ID',
            'tagId' => 'Tag ID',
        ];
    }
}