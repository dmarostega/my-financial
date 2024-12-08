<?php

namespace App\Helpers;

class Month {
    protected static $months;

    public static function all() {
        return self::months();        
    }

    private static function months() {
        if(!self::$months) {
            self::$months = [
                1 => __('janeiro'),
                2 => __('fevereiro'),
                3 => __('março'),
                4 => __('abril'),
                5 => __('maio'),
                6 => __('junho'),
                7 => __('julho'),
                8 => __('agosto'),
                9 => __('setembro'),
                10 => __('outubro'),
                11 => __('novembro'),
                12 => __('dezembro')
            ];
        }

        return self::$months;
    }
}