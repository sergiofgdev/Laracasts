<?php
namespace Core;
class Validator
{
    public static function string($value, $minChar=1, $maxChar= INF) // Static function when it doesnt depend on important external elements
    {
        $value = trim($value);
        $valueLen = strlen($value);
        // This will return true or false
        return $valueLen >= $minChar && $valueLen <= $maxChar;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}