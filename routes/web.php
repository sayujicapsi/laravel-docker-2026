<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users.index');
});

Route::resource('users', UserController::class)->except('show');
Route::resource('countries', CountryController::class)->except('show');
Route::resource('cities', CityController::class)->except('show');
