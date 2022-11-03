<?php

/**
 * 打印函数
 */
if (!function_exists('dd')) {
    function dd($arr)
    {
        echo "<pre>";
        print_r($arr);
        exit();
    }
}