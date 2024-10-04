<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    // logger()->channel('telegram')->debug('Hello world');
    // logger()->channel('telegram')->info('123');

    return view('welcome');
});
