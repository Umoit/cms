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
//主页
Route::get('/', 'IndexController@index')->name('home');

//json
Route::get('json/topic','Admin\TopicController@indexJson');


//登录
Route::get('login','UserController@getLogin')->name('login');
Route::post('login','UserController@postLogin')->name('post.login');

//注册
Route::get('register','UserController@getRegister')->name('register');
Route::post('register','UserController@postRegister')->name('post.register');
//用户
Route::resource('user', 'UserController', ['only' => ['show', 'update', 'edit']]);

Route::get('logout', 'UserController@logout')->name('logout');



//话题
Route::resource('topic','TopicController');
Route::resource('category','TopicController');

//文章
Route::get('article/{article}','ArticleController@show')->name('articleShow');

//magento
Route::get('case','ArticleController@show');



//后台


Route::get('admin/login','Admin\IndexController@getLogin');
Route::post('admin/login','Admin\IndexController@postLogin')->name('admin.login');

Route::group(['prefix' => 'admin'],function(){

	Route::get('logout','Admin\IndexController@logout');
	
	Route::get('test','Admin\IndexController@test')->name('admin.test');

	Route::get('dashboard','Admin\IndexController@dashboard')->name('admin.dashboard');

	//删除话题
	Route::get('topic/{id}/delete', 'Admin\TopicController@delete')->name('topic.delete');

	//话题
	Route::resource('topic','Admin\TopicController');

	//分类
	Route::resource('category','Admin\CategoryController');
	//删除分类
	Route::get('category/{id}/delete', 'Admin\CategoryController@delete')->name('category.delete');

	//文章
	Route::resource('article','Admin\ArticleController');
	//删除文章
	Route::get('article/{id}/delete', 'Admin\ArticleController@delete')->name('article.delete');

	//标签
	Route::resource('tag','Admin\TagController');
	Route::get('tag/{id}/delete', 'Admin\TagController@delete')->name('tag.delete');
	


	//采集目标
	Route::resource('spiderTarget','Admin\SpiderController');
	//删除采集目标
	Route::get('spiderTarget/{id}/delete', 'Admin\SpiderController@delete')->name('spiderTarget.delete');
	Route::get('spiderTarget/{id}/createJob', 'Admin\SpiderController@createSpiderJob')->name('createSpiderJob');
	//采集任务
	Route::get('spiderJob', 'Admin\SpiderController@jobIndex')->name('spiderJob');
	Route::get('spiderJob/{id}/toArticle', 'Admin\SpiderController@jobToArticle')->name('jobToArticle');
	Route::get('spiderJob/{id}/delete', 'Admin\SpiderController@spiderJobDelete')->name('spiderJob.delete');
	Route::post('spiderJob/spiderJob', 'Admin\SpiderController@jobPost')->name('spiderJob.post');



	Route::get('tytest','Admin\SpiderController@tytest');


	//赛事
	Route::resource('match','Admin\MatchController');
	//删除赛事
	Route::get('match/{id}/delete', 'Admin\MatchController@delete')->name('match.delete');
	


});