<?php

namespace frontend\widgets;

use common\models\Tag;
use yii\base\Widget;

class AllTags extends Widget
{
    public $view = 'index';

    public function run()
    {
        $tags = Tag::find()->all();

        return $this->render('all-tags/' . $this->view, compact('tags'));
    }
}