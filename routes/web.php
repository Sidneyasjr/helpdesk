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

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function (){

    /** Formulario de Login */
    Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('login', 'AuthController@login')->name('login.do');

    /** Rotas Protegidas */
    Route::group(['middleware' => ['auth']], function (){

        /** Dashboard Home*/
        Route::get('home', 'AuthController@home')->name('home');

        /** usuarios */
        Route::get('users/team', 'UserController@team')->name('users.team');
        Route::resource('users', 'UserController');

        /** Clientes */
        Route::resource('costumers', 'CostumerController');

        /** Chamados */
        Route::resource('issues', 'IssueController');
    });


    /** Logout */
    Route::get('logout', 'AuthController@logout')->name('logout');
});
