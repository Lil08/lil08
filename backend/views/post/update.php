<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = 'Редактировать: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Посты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="post-update">

    <?= $this->render('_form', compact('model', 'listCategories', 'tags', 'selectedTags')) ?>


</div>
