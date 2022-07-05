<?php

use frontend\helpers\SiteHelper;
use yii\helpers\Html;

/**@var \common\models\Post $model */
SiteHelper::vardump($dataProvider);die;
?>
<?php if (($index + 1) % 2 === 1) { ?>
<div class="row">
    <?php } ?>
    <div class="col-md-6">
        <article class="blog_style1 small">
            <div class="blog_img">
                <img class="img-fluid" src="img/home-blog/blog-small-3.jpg" alt="">
            </div>
            <div class="blog_text">
                <div class="blog_text_inner">
                    <div class="cat">
                        <a class="cat_btn" href="#">Gadgets</a>
                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
                    </div>
                    <a href="single-blog.html"><h4><?= $model->title ?></h4></a>
                    <p><?= SiteHelper::shortText($model->text) ?></p>
                    <a class="blog_btn" href="#">Read More</a>
                </div>
            </div>
        </article>
    </div>
    <?php if (($index + 1) % 2 === 0) { ?>
</div>
<?php } ?>


<!--<article class="blog_style1">-->
<!--    <div class="blog_img">-->
<!--        <img class="img-fluid" src="--><? //= $model->image ?><!--" alt="" width="600">-->
<!--    </div>-->
<!--    <div class="blog_text">-->
<!--        <div class="blog_text_inner">-->
<!--            <div class="cat">-->
<!--                --><?php //foreach ($model->tags as $tag) { ?>
<!--                    <a class="cat_btn" href="#">--><? //= $tag->name ?><!--</a>-->
<!--                --><?php //} ?>
<!--                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> --><? //= $model->createdAt ?><!--</a>-->
<!--            </div>-->
<!--            <a href="#"><h4>--><? //= $model->title ?><!--</h4></a>-->
<!--            <p>--><? //= SiteHelper::shortText($model->text) ?><!--</p>-->
<!--            --><? //= Html::a('Read More', '/post/' . $model->code, ['class' => 'blog_btn']) ?>
<!--        </div>-->
<!--    </div>-->
<!--</article>-->
<br>
