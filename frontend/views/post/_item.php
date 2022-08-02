<?php

use frontend\helpers\SiteHelper;
use yii\helpers\Html;

/**@var \common\models\Post $model */
//SiteHelper::vardump($model->getUrl());die;
?>
<?php if (($index + 1) % 2 === 1) { ?>
<div class="row">
    <?php } ?>
    <div class="col-md-6">
        <article class="blog_style1 small">
            <div class="blog_img">
                <img class="img-fluid" src="<?= $model->image ?>" alt="">
            </div>
            <div class="blog_text">
                <div class="blog_text_inner">
                    <div class="cat">
                        <?php foreach ($model->tags as $tag) { ?>
                            <a class="cat_btn" href="#"><?= $tag->name ?></a>
                        <?php } ?>
                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?= $model->createdAt ?></a>
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= $model->getCommnetsCount() ?></a>
                    </div>
                    <a href="<?= $model->getUrl() ?>"><h4><?= $model->title ?></h4></a>
                    <p><?= SiteHelper::shortText($model->text) ?></p>
                    <?= Html::a('Read More', $model->getUrl(), ['class' => 'blog_btn']) ?>
                </div>
            </div>
        </article>
    </div>
    <?php if (($index + 1) % 2 === 0 || $index === $count - 1) { ?>
</div>
<?php } ?>

<br><br><br>
