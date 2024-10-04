<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    // logger()->channel('telegram')->debug('Hello world');

    return view('welcome');
});
