<?php
/* @var $this \yii\web\View */
/* @var $category \andrewdanilov\custompages\common\models\Category */
/* @var $pages \andrewdanilov\custompages\common\models\Page[] */
/* @var $tags \andrewdanilov\custompages\common\models\PageTag[] */

/* @var $pagination \yii\data\Pagination */

use andrewdanilov\custompages\frontend\assets\CustomPagesAsset;
use app\widgets\AllCategories;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ListView;

$this->title = $category->meta_title ?: $category->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $category->meta_description,
]);

CustomPagesAsset::register($this);

$pagination = new \yii\data\Pagination(['totalCount' => 3, 'pageSize' => 2]);
$pagination->pageSizeParam = false;
$pagination->forcePageParam = false;

//$pages = $pages->offset($pagination->offset)
//    ->limit($pagination->limit)
//    ->all();
?>
<section class="blog_area p_120">
    <?= $category->processedText ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    <?php foreach (array_chunk($pages, 2, true) as $partPages) {
                        ?>
                        <div class="row">
                            <?php foreach ($partPages as $page) {
                                ?>
                                <div class="col-md-6">
                                    <article class="blog_style1 small">
                                        <div class="blog_img">
                                            <img class="img-fluid" src="<?= $page->image ?>" alt="">
                                        </div>
                                        <div class="blog_text">
                                            <div class="blog_text_inner">
                                                <div class="cat">
                                                    <?php foreach ($page->tags as $tag) {
                                                        ?>
                                                        <a class="cat_btn" href="#"><?= $tag->name ?></a>
                                                    <?php } ?>
                                                    <a href="#"><i class="fa fa-calendar"
                                                                   aria-hidden="true"></i> <?= $page->published_at ?>
                                                    </a>
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                                        05</a>
                                                </div>
                                                <a href="<?= Url::to(['default/page', 'id' => $page->id]) ?>">
                                                    <h4><?= $page->title ?></h4></a>
                                                <p><?= $page->shortText ?></p>
                                                <a class="blog_btn"
                                                   href="<?= Url::to(['default/page', 'id' => $page->id]) ?>">Read
                                                    More</a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                        <br>
                    <?php } ?>
                    <? echo LinkPager::widget([
                        'pagination' => $pagination,
                        'registerLinkTags' => true
                    ]); ?>
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
                                </a>
                            </li>
                            <li class="page-item"><a href="#" class="page-link">01</a></li>
                            <li class="page-item active"><a href="#" class="page-link">02</a></li>
                            <li class="page-item"><a href="#" class="page-link">03</a></li>
                            <li class="page-item"><a href="#" class="page-link">04</a></li>
                            <li class="page-item"><a href="#" class="page-link">09</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
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
                        </div>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img img-fluid" src="img/blog/author.png" alt="">
                        <h4>Charlie Barber</h4>
                        <p>Senior blog writer</p>
                        <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you
                            should have to spend money on boot camp when you can get. Boot camps have itssuppor ters
                            andits detractors.</p>
                        <div class="social_icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
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
                    <aside class="single-sidebar-widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <div class="form-group d-flex flex-row">
                            <div class="input-group">
                                <input type="text" class="form-control" id="inlineFormInputGroup"
                                       placeholder="Enter email" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Enter email'">
                            </div>
                            <a href="#" class="bbtns"><i class="lnr lnr-arrow-right"></i></a>
                        </div>
                        <div class="br"></div>
                    </aside>
                    <?= AllCategories::widget() ?>
                </div>
            </div>
        </div>
    </div>
</section>