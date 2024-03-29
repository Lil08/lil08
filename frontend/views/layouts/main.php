<?php

/** @var \yii\web\View $this */

/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\widgets\AllCategories;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="/"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav">
                            <li class="nav-item active"><a class="nav-link" href="/">Главная</a></li>
                            <li class="nav-item"><a class="nav-link" href="category.html">Обо мне</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">Блог</a>
                                <?= AllCategories::widget(['view' => 'menu']) ?>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">Мои работы</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="single-blog.html">Портфолио</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="elements.html">Калькулятор времени</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Контакты</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right header_social ml-auto">
                            <li class="nav-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li class="nav-item"><a href="#"><i class="fa fa-vk"></i></a></li>
                            <li class="nav-item"><a href="#"><i class="fa fa-paper-plane"></i></a></li>
                            <li class="nav-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="logo_part">
            <div class="container">
                <a class="logo" href="#"><img src="img/logo.png" alt=""></a>
            </div>
        </div>
    </header>
    <?= $content ?>
    <footer class="footer-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">About Us</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6 class="footer_title">Newsletter</h6>
                        <p>Stay updated with our latest trends</p>
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                  action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                  method="get" class="subscribe_form relative">
                                <div class="input-group d-flex flex-row">
                                    <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Email Address '" required="" type="email">
                                    <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>
                                </div>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h6 class="footer_title">Instagram Feed</h6>
                        <ul class="list instafeed d-flex flex-wrap">
                            <li><img src="img/instagram/Image-01.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-02.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-03.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-04.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-05.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-06.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-07.jpg" alt=""></li>
                            <li><img src="img/instagram/Image-08.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget f_social_wd">
                        <h6 class="footer_title">Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="f_social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>

    </body>
    </html>
<?php $this->endPage();
