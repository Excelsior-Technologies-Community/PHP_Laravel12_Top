<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('top', [
        'php_version' => phpversion(),
        'laravel_version' => app()->version(),
        'os' => PHP_OS,
        'memory_usage' => round(memory_get_usage() / 1024 / 1024, 2) . ' MB',
        'memory_peak' => round(memory_get_peak_usage() / 1024 / 1024, 2) . ' MB',
        'disk_free' => round(disk_free_space("/") / 1024 / 1024 / 1024, 2) . ' GB',
        'disk_total' => round(disk_total_space("/") / 1024 / 1024 / 1024, 2) . ' GB',
    ]);

});

