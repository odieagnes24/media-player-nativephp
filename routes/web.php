<?php

use App\Http\Controllers\PlayerController;
use App\Livewire\Counter;
use App\Livewire\Settings;
use App\Livewire\SongList;
use App\Livewire\TrackList;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return phpinfo();
});

Route::get('/list', SongList::class)->name('list')->lazy();
Route::get('/tracks', TrackList::class)->name('tracks')->lazy();
Route::get('/settings', Settings::class)->name('settings');

Route::get('/readfile/{track:id}', [PlayerController::class, 'readfile']);
