<?php

/**
 * Print the given value and kill the script.
 *
 * @param  mixed $value
 * @return void
 */
if (!function_exists('alert')) {
    function alert($value, $die = false)
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        if ($die) {
            die;
        }
    }
}
