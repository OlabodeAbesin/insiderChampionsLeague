<?php
// use Symfony\Component\Routing\Route;

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

Route::get('/insider', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/setupData', 'HomeController@setUp');
Route::get('/nextWeek', 'PlayController@nextWeek');
Route::get('/playAll', 'PlayController@playAll');
Route::resource('/teams', 'TeamController');
Route::resource('/fixtures', 'FixtureController');


Route::get('/', function () {
    return view('polaris');
});
Route::post('/polaris', 'PolarisController@store');