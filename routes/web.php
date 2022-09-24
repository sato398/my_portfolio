<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('top');
})->name('top');

Route::get('/skils', function () {
    return view('skil');
})->name('skil');

Route::group([
    'prefix' => 'works',
], function () {
    Route::get('/', function () {
        return view('work');
    })->name('work');

    Route::get('/{workSlug}', function () {
        return view('work_item');
    })->name('work.item');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

//404
Route::fallback(function(){
    return response()->view('errors.404', [], 404);
});
