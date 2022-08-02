<?php

namespace frontend\helpers;

use andrewdanilov\helpers\TextHelper;

class SiteHelper
{
    public static function vardump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    public static function shortText($text) {

        return TextHelper::shortText($text, 30);
    }

}