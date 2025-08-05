<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Artisan::command('ciccio', function () {
//     $this->comment('ciao sono ciccio');
// })->purpose('Display an inspiring quote');
