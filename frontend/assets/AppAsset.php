<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/main.css',
//        'css/variables.css',
//        'css/aos.css',
        'css/bootstrap.css',
        'fonts/font-awesome.min.css',
        'css/style.css',
        'css/responsive.css',
        'css/owl.carousel.min.css',
        'css/simpleLightbox.css',
        'css/nice-select.css',
        'css/animate.css',
        'css/jquery-ui.css'
//        'css/bootstrap-icons.css',
//        'css/glightbox.css',
//        'css/swiper-bundle.min.css',
    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
        'js/popper.js',
        'js/bootstrap.min.js',
        'js/stellar.js',
        'js/jquery.ajaxchimp.min.js',
        'js/mail-script.js',
        'js/theme.js',
        'js/jquery.nice-select.min.js',
        'js/simpleLightbox.min.js',
        'js/imagesloaded.pkgd.min.js',
        'js/isotope-min.js',
        'js/owl.carousel.min.js',
        'js/jquery-ui.js',
        'js/owl.carousel.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap4\BootstrapAsset',
    ];
}
