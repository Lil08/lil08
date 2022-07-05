<?php

namespace frontend\widgets;

use andrewdanilov\custompages\common\models\Category;
use andrewdanilov\custompages\common\models\PageTag;
use yii\base\Widget;

class AllTags extends Widget
{
    public $view = 'index';

    public function run()
    {
        $tags = PageTag::find()->all();

        return $this->render('all-tags/' . $this->view, compact('tags'));
    }
}