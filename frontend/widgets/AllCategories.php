<?php

namespace frontend\widgets;

use common\models\Category;
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