<?php
/**
 * @var \common\models\Post $model
 * @var \common\models\Comments $comments
 * @var $formComment
 */

use frontend\widgets\AllCategories;
use frontend\widgets\AllTags;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<section class="blog_area p_120 single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main_blog_details">
                    <img class="img-fluid" src="<?= $model->image ?>" alt="">
                    <a href="#"><h4<?= $model->title ?></h4></a>
                    <div class="user_details">
                        <div class="float-left">
                            <?php foreach ($model->tags as $tag) { ?>
                                <a href="#"><?= $tag->name ?></a>
                            <?php } ?>
                        </div>
                        <div class="float-right">
                            <div class="media">
                                <div class="media-body">
                                    <p><?= $model->createdAt ?></p>
                                </div>
                                <div class="d-flex">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= \yii\helpers\HtmlPurifier::process($model->text) ?>

                </div>
                <div class="navigation-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                            </div>
                            <div class="detials">
                                <p>Prev Post</p>
                                <a href="#"><h4>Space The Final Frontier</h4></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            <div class="detials">
                                <p>Next Post</p>
                                <a href="#"><h4>Telescopes 101</h4></a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                            </div>
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments-area">
                    <h4><?= count($comments) ?> комментариев</h4>
                    <?php foreach ($comments as $comment) { ?>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="desc">
                                        <h5><a href="#"><?= $comment->name ?></a></h5>
                                        <p class="date"><?= $comment->createdAt ?> </p>
                                        <p class="comment">
                                            <?= $comment->message ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <?php $form = ActiveForm::begin(); ?>

                    <div class="form-group form-inline">
                        <div class="form-group col-lg-6 col-md-6 name">
                            <?= $form->field($formComment, 'name')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Введите имя'])->label(false) ?>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 email">
                            <?= $form->field($formComment, 'email')->textInput(['maxlength' => true, 'class' => 'form-control', 'placeholder' => 'Введите email'])->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                    <?= $form->field($formComment, 'message')->textarea(['rows' => 6, 'class' => 'form-control mb-10', 'placeholder' => 'Введите сообщение'])->label(false) ?>
                    </div>

                    <?= $form->field($formComment, 'post_id')->textInput(['hidden' => true, 'value' => $model->id])->label(false) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'primary-btn submit_btn']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post1.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.html"><h3>Space The Final Frontier</h3></a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post2.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.html"><h3>The Amazing Hubble</h3></a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post3.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.html"><h3>Astronomy Or Astrology</h3></a>
                                <p>03 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post4.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.html"><h3>Asteroids telescope</h3></a>
                                <p>01 Hours ago</p>
                            </div>
                        </div>
                        <div class="br"></div>
                    </aside>
                    <?= AllCategories::widget() ?>
                    <?= AllTags::widget() ?>
                </div>
            </div>
        </div>
    </div>
</section>
