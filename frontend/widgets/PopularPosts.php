<?php

namespace frontend\widgets;

use common\models\Post;
use yii\base\Widget;

class PopularPosts extends Widget
{
    public $view = 'index';

    public function run()
    {
        $posts = Post::find()
            ->where(['active' => true])
            ->limit(5)
            ->orderBy('createdAt')
            ->all();

        return $this->render('popular-posts/' . $this->view, compact('posts'));
    }

}