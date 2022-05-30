<?php

namespace app\widgets;

use andrewdanilov\custompages\common\models\Category;
use yii\base\Widget;

class AllCategories extends Widget
{
    public $view = 'index';

    public function run()
    {
        $categories = Category::find()->all();

        return $this->render('all-categories/' . $this->view, compact('categories'));
    }
}