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

// show home page 
Route::get('home','HomeController@index');

///////////////////////////////////////////////////////////////////////
// administration
//////////////////////////////////////////////////////////////////////

  Route::group(['namespace'=>'Auth'],function (){
// login 
	Route::get('login','LoginController@showLoginForm')->name('adminLoginForm');
	Route::post('login','LoginController@login');
// logout
    Route::get('logout','LoginController@logout');
// reigster
    Route::get('register', 'RegisterController@showRegistrationForm');
    Route::post('register', 'RegisterController@register')->name('adminRegister');
});

Route::get('prediction/sendEvents','PredictionController@sendEvents');

///////////////////////////////////////////////////////////////////////
// simple themes operation
//////////////////////////////////////////////////////////////////////

// show all themes in list
Route::get('themes/showAll','ThemeController@showAll');

// update theme's name (for now ,it only has this attributes can be change)
Route::get('themes/update/id/{id}','ThemeController@updateTheme')->name('themes.updateForm');
Route::post('themes/update','ThemeController@update');

// delete a theme
Route::get('themes/delete/id/{id}','ThemeController@delete');

// add a new theme
Route::get('themes/add','ThemeController@addTheme');
Route::post('themes/add','ThemeController@add');

///////////////////////////////////////////////////////////////////////
//  article operation
//////////////////////////////////////////////////////////////////////

//show all articles have gotton
Route::get('articles/showAll','ArticleController@showAll');
// show all articles havn't been done
Route::get('articles/showAllUndone','ArticleController@showAllUndone');
// show detail
Route::get('articles/showDetail/{id}','ArticleController@showDetail');
//classfiy
Route::post('articles/classify','ArticleController@classify')->name('articles.classify');

///////////////////////////////////////////////////////////////////////
//  gzh operation
//////////////////////////////////////////////////////////////////////

// add
Route::get('gzh/add','GzhController@addGzh');
Route::post('gzh/add','GzhController@add');
// show all
Route::get('gzh/showAll','GzhController@showAll');
// update
Route::get('gzh/update/id/{id}','GzhController@updateGzh');
Route::post('gzh/update','GzhController@update');

// delete a theme
Route::get('gzh/delete/id/{id}','GzhController@delete');

///////////////////////////////////////////////////////////////////////
//  user 
//////////////////////////////////////////////////////////////////////

// show all
Route::get('gatherUser/showAll','UserController@showAll');


///////////////////////////////////////////////////////////////////////
//  spider
//////////////////////////////////////////////////////////////////////

// store gzh infomation
// method:post
// arg1: gzh's name
// arg2: gzh's historyUrl
// return json include the id of the gzh besides status code,it will be used when you want to store the articles of a specific gzh
// Route::post('spider/gzh/store','SpiderController@storeGzhInfo');

// Get url by gzh's id 
// method:get
// arg1:gzh_id
// Route::get('spider/gzh/getUrl','SpiderController@getGzhUrlById');

// storge article infomation
// method : post
// 5 args:  gzh_id,contentUrl,title,time,gzh_name
Route::post('spider/article/store','SpiderController@storeArticle');


