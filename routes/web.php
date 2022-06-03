<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Calendar;
use Illuminate\Support\Facades\App;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/lang/{locale}', function ($locale) {
    App::setLocale($locale);
    return view('welcome');
});

Route::view('/', 'home');

Livewire::component('calendar', Calendar::class);
