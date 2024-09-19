<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralInformationController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/general-info', [GeneralInformationController::class, 'index']);
