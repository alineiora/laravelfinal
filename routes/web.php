<?php

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
    return view('welcome');
});


Route::get('/atividades/create', 'AtividadeController@create');
Route::get('/atividades/{id}/delete', 'AtividadeController@delete');
Route::get('/atividades', 'AtividadeController@index');
Route::get('/atividades/{id}', 'AtividadeController@show');
Route::get('/atividades/{id}/edit', 'AtividadeController@edit');
Route::put('/atividades/{id}', 'AtividadeController@update');
Route::delete('/atividades/{id}', 'AtividadeController@destroy');
Route::post('/atividades', 'AtividadeController@store');

Route::get('/mensagem/create', 'mensagemController@create');
Route::get('/mensagem', 'mensagemController@index');
Route::get('/mensagem/{id}', 'mensagemController@show');
Route::get('/mensagem/{id}/edit', 'mensagemController@edit');
Route::put('/mensagem/{id}', 'mensagemController@update');
Route::get('/mensagem/{id}/delete', 'mensagemController@delete');
Route::delete('/mensagem/{id}', 'mensagemController@destroy');
Route::post('/mensagem', 'mensagemController@store');




//php artisan key:generate
//composer dump-autoload
//php artisan migrate --seed