<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\BlockController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register we;b routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get("test/index", "TestController@index");
Route::get("test/index", [TestController::class, "index"]);
Route::get("test/show", [TestController::class, "show"]);
Route::resource('topic', TopicController::class);
Route::resource("block", BlockController::class);
// Route::resource('topic', 'TopicController');
// Route::resource('block', 'BlockController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
