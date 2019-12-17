<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["middleware" => "api", "prefix" => "admin", "namespace" => "Auth"], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group(["middleware" => "api", "prefix" => "admin"], function () {
    Route::get('get/categories/{type}', 'CategoriesController@getCategoriesBySlug');
    Route::get('cashflows/{type}', 'CashflowController@byType');
    Route::apiResource('cashflows', 'CashflowController')->except(['create', 'edit']);
    Route::get('cashflows/search/{keyword}', 'CashflowController@search');
});