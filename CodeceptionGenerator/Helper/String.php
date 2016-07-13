<?php

/**
 * Convert camel case.
 *
 * @param $string
 * @return string
 */
function camel_case($string)
{
    if (is_string($string) === false || strlen($string) === 0) {
        return '';
    }

    $string = str_replace(['_', '-'], ' ', $string);
    $string = ucwords($string);
    $string = str_replace(' ', '', $string);

    return $string;
}
