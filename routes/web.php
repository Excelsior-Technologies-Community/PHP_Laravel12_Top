<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    $startTime = session('start_time');

    if (!$startTime) {
        session(['start_time' => time()]);
        $startTime = time();
    }

    $uptimeSeconds = time() - $startTime;

    $days = floor($uptimeSeconds / 86400);
    $hours = floor(($uptimeSeconds % 86400) / 3600);
    $minutes = floor(($uptimeSeconds % 3600) / 60);

    $uptime = "{$days}d {$hours}h {$minutes}m";

    return view('top', [
        'php_version' => phpversion(),
        'laravel_version' => app()->version(),
        'os' => PHP_OS,
        'memory_usage' => round(memory_get_usage() / 1024 / 1024, 2) . ' MB',
        'memory_peak' => round(memory_get_peak_usage() / 1024 / 1024, 2) . ' MB',
        'disk_free' => round(disk_free_space("/") / 1024 / 1024 / 1024, 2) . ' GB',
        'disk_total' => round(disk_total_space("/") / 1024 / 1024 / 1024, 2) . ' GB',
        'uptime' => $uptime,
    ]);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::post('/profile/avatar', [HomeController::class, 'updateAvatar'])->name('profile.avatar');
});