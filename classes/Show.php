<?php


class Show
{
    /**
     * Show array
     * @param $array
     */
    public static function arrayType($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    /**
     * Show string
     * @param $string
     */
    public static function stringType($string)
    {
        echo "<p>$string</p>";
    }
}