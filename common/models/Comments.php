<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $subject
 * @property string|null $message
 * @property string|null $createdAt
 * @property int|null $active
 * @property int|null $post_id
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['createdAt'], 'safe'],
            [['active', 'post_id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['email','name','message'] , 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'message' => 'Сообщение',
            'createdAt' => 'Created At',
            'active' => 'Active',
            'post_id' => 'Post ID',
        ];
    }

    public function beforeSave($insert)
    {
        if (!$this->active) {
            $this->active = true;
        }
        if (!$this->createdAt || !strtotime($this->createdAt)) {
            $this->createdAt = date('Y-m-d');
        }

        $this->createdAt = date('Y-m-d', strtotime($this->createdAt));

        return parent::beforeSave($insert);
    }
}
