<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\share;

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
/*
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
*/


Route::get('/',  '\App\Http\controllers\homeController@index')->middleware('auth');
Route::post('/',  '\App\Http\controllers\homeController@share')->middleware('auth');

Route::get('/download/{id}', '\App\Http\Controllers\DownloadController@download')->name('download.file')->middleware('auth');



Route::get('/change', function () {
    return view('change-user');
});

Route::get('/edit/{id}', '\App\Http\controllers\filesController@edit');


Route::get('/update-permission/{email}', '\App\Http\controllers\register@edit')->name('update-permission');
Route::patch('/update-permission/{email}', '\App\Http\controllers\register@update')->name('update-permission.update');


Route::get('/upload', '\App\Http\controllers\filesController@index');
Route::post('/upload', '\App\Http\controllers\filesController@store')->name('upload.store');




Route::get('/shareToOther', '\App\Http\controllers\shares@toOther')->name('share');
Route::get('/shareToMe', '\App\Http\controllers\shares@toME')->name('shareByMe');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
