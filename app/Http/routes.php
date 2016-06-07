<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'CertificationController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::group(['as' => 'certification.', 'prefix' => 'certification'], function () {
        // Route Certification
        Route::group(['as' => 'certifications.', 'prefix' => 'certifications'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'CertificationController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'CertificationController@create']);
            Route::post('save', ['as' => 'store', 'uses' => 'CertificationController@store']);
            Route::get('{id}/show', ['as' => 'show', 'uses' => 'CertificationController@show']);
            Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'CertificationController@edit']);
            Route::put('{id}/update', ['as' => 'update', 'uses' => 'CertificationController@update']);
            Route::get('{id}/delete', ['as' => 'delete', 'uses' => 'CertificationController@destroy']);
        });
        // Route Category
        Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'CategoryController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'CategoryController@create']);
            Route::get('{id}/create', ['as' => 'category', 'uses' => 'CategoryController@category']);
            Route::post('save', ['as' => 'store', 'uses' => 'CategoryController@store']);
            Route::get('{id}/show', ['as' => 'show', 'uses' => 'CategoryController@show']);
            Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'CategoryController@edit']);
            Route::put('{id}/update', ['as' => 'update', 'uses' => 'CategoryController@update']);
            Route::get('{id}/delete', ['as' => 'delete', 'uses' => 'CategoryController@destroy']);
        });
        // Route Question
        Route::group(['as' => 'question.', 'prefix' => 'question'], function () {
            Route::get('', ['as' => 'index', 'uses' => 'QuestionController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'QuestionController@create']);
            Route::get('{id}/create', ['as' => 'question', 'uses' => 'QuestionController@question']);
            Route::post('save', ['as' => 'store', 'uses' => 'QuestionController@store']);
            Route::get('{id}/show', ['as' => 'show', 'uses' => 'QuestionController@show']);
            Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'QuestionController@edit']);
            Route::put('{id}/update', ['as' => 'update', 'uses' => 'QuestionController@update']);
            Route::get('{id}/delete', ['as' => 'delete', 'uses' => 'QuestionController@destroy']);
        });
    });
});
