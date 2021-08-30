<?php

namespace App\Helpers;

class Helper
{
    public static function extractElementByKey(array &$array, string $key)
    {
        if (!array_key_exists($key, $array)) {
            return [];
        }

        $element = $array[$key];

        unset($array[$key]);

        return $element;
    }
}
