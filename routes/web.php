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

Route::get('/', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'	
	]);

Route::group(['prefix'=>'user'],function(){

	// only authenticatd people will access profile page ==>auth
	// only unauthenticated people will access signin/signup page ==> guest
	Route::group(['middleware' => 'guest'],function(){
		Route::get('/signup', [
			'uses' => 'UserController@getSignup',
			'as' => 'user.signup'
			]);


		Route::post('/signup', [
			'uses' => 'UserController@postSignup',
			'as' => 'user.signup'	
			]);


		Route::get('/signin', [
			'uses' => 'UserController@getSignin',
			'as' => 'user.signin'	
			]);


		Route::post('/signin', [
			'uses' => 'UserController@postSignin',
			'as' => 'user.signin'
			]);
	});

	Route::get('/profile', [
		'uses' => 'UserController@getProfile',
		'as' => 'user.profile',
		'middleware' => 'auth'	
		]);
	Route::get('/logout',[
		'uses' => 'UserController@getLogout',
		'as' => 'user.logout',
		'middleware' => 'auth'
		]);
	Route::get('add-to-cart/{id}',[
		'uses' => 'ProductController@getAddToCart',
		'as' => 'product.addToCart',
		'middleware' => 'auth'
		]);

	Route::get('reduce/{id}',[
		'uses' => 'ProductController@getReduceByOne',
		'as' => 'product.reduceByOne',
		'middleware' => 'auth'
		]);

	Route::get('remove/{id}',[
		'uses' => 'ProductController@getReduceItem',
		'as' => 'product.remove',
		'middleware' => 'auth'
		]);

	Route::get('shopping-cart',[
		'uses' => 'ProductController@getCart',
		'as' => 'product.shoppingCart',
		'middleware' => 'auth'
		]);

	Route::get('/checkout',[
		'uses' => 'ProductController@getCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
		]);

	Route::post('/checkout',[
		'uses' => 'ProductController@postCheckout',
		'as' => 'checkout',
		'middleware' => 'auth'
		]);
});


