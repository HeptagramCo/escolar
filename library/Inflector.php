<?php

class Inflector {

    public static function swap($value)
    {
        $segments = explode('-', $value);

        array_walk($segments, function (&$item) {
            $item = ucfirst($item);
        });

        return implode('', $segments);
    }

    public static function lowerSwap($value)
    {
        return lcfirst(static::swap($value));
    }

}