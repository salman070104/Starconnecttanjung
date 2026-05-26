<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule customer billing status reset to unpaid on the 1st of every month at midnight (00:00)
Schedule::command('pelanggan:reset-billing')->monthlyOn(1, '00:00');
