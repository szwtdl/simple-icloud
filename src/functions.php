<?php

declare(strict_types=1);
/**
 * This file is part of szwtdl/simple-icloud
 * @link     https://www.szwtdl.cn
 * @contact  szpengjian@gmail.com
 * @license  https://github.com/szwtdl/simple-icloud/blob/master/LICENSE
 */
if (! function_exists('dd')) {
    function dd($arr)
    {
        echo '<pre>';
        print_r($arr);
        exit;
    }
}
