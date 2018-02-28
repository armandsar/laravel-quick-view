<?php


if (!function_exists('quick')) {
    function quick($data = [], $mergeData = [])
    {
        return (new \Armandsar\QuickView\ViewResolver($data, $mergeData))->call();
    }
}