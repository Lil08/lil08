<?php

use andrewdanilov\ckeditor\CKEditor;
use andrewdanilov\helpers\CKEditorHelper;
use andrewdanilov\helpers\NestedCategoryHelper;
use andrewdanilov\InputImages\InputImages;
use common\models\Category;
use dosamigos\datepicker\DatePicker;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
/* @var $listCategories */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList($listCategories) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= Html::dropDownList('tags', $selectedTags, $tags, ['class' => 'form-control', 'multiple' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', CKEditorHelper::defaultOptions()),
    ]) ?>

    <?= $form->field($model, 'createdAt')->widget(DatePicker::class, [
        'language' => Yii::$app->language,
        'template' => '{input}{addon}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'clearBtn' => true,
            'todayBtn' => 'linked',
        ],
        'clientEvents' => [
            'clearDate' => 'function (e) {$(e.target).find("input").change();}',
        ],
    ]) ?>

    <?= $form->field($model, 'image')->widget(InputImages::class)  ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true])  ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true])  ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true])  ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
