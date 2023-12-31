<?php

use Illuminate\Support\Facades\Route;

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

// auth
Route::group(['namespace' => 'Auth'], function ($router) {
	Route::group(['prefix' => 'auth'], function ($router) {
		$router->pattern('userId', '[0-9]+');
		
		Route::post('register', 'RegisterController@register')->name('auth.register');
		Route::post('login', 'LoginController@login')->name('auth.login');
		Route::get('logout/{userId}', 'LoginController@logout')->name('auth.logout');
		
		Route::post('password/email', 'ForgotPasswordController@sendResetLink')->name('auth.password.email');
		Route::post('password/token', 'ResetPasswordController@sendResetToken')->name('auth.password.token');
		Route::post('password/reset', 'ResetPasswordController@reset')->name('auth.password.reset');
		
		$router->pattern('provider', 'facebook|linkedin|google');
		Route::get('{provider}', 'SocialController@getProviderTargetUrl');
		Route::get('{provider}/callback', 'SocialController@handleProviderCallback');
	});
});

// categories
Route::group(['prefix' => 'categories'], function ($router) {
	$router->pattern('id', '[0-9]+');
	$router->pattern('slugOrId', '.+');
	
	Route::get('/', 'CategoryController@index')->name('categories.index');
	Route::get('{slugOrId}', 'CategoryController@show')->name('categories.show');
	Route::post('{id}/fields', 'CategoryController@getCustomFields')->name('categories.fields');
});



// countries
Route::group(['prefix' => 'countries'], function ($router) {
	$router->pattern('code', '[a-zA-Z]{2}');
	$router->pattern('countryCode', '[a-zA-Z]{2}');
	
	Route::get('/', 'CountryController@index')->name('countries.index');
	Route::get('{code}', 'CountryController@show')->name('countries.show');
	
	Route::get('{countryCode}/subAdmins1', 'SubAdmin1Controller@index')->name('subAdmins1.index');
	Route::get('{countryCode}/subAdmins2', 'SubAdmin2Controller@index')->name('subAdmins2.index');
	Route::get('{countryCode}/cities', 'CityController@index')->name('cities.index');
});

// subAdmins1
Route::group(['prefix' => 'subAdmins1'], function ($router) {
	$router->pattern('code', '.+');
	
	Route::get('{code}', 'SubAdmin1Controller@show')->name('subAdmins1.show');
});

// subAdmins2
Route::group(['prefix' => 'subAdmins2'], function ($router) {
	$router->pattern('code', '.+');
	
	Route::get('{code}', 'SubAdmin2Controller@show')->name('subAdmins2.show');
});

// cities
Route::group(['prefix' => 'cities'], function ($router) {
	$router->pattern('id', '[0-9]+');
	
	Route::get('{id}', 'CityController@show')->name('cities.show');
});

// users
Route::group(['prefix' => 'users'], function ($router) {
	$router->pattern('id', '[0-9]+');
	
	Route::get('/', 'UserController@index')->name('users.index');
	Route::get('{id}', 'UserController@show')->name('users.show');
	Route::post('/', 'UserController@store')->name('users.store');
	Route::group(['middleware' => ['auth:sanctum']], function ($router) {
		Route::put('{id}', 'UserController@update')->name('users.update');
	});
	Route::delete('{id}', 'UserController@destroy')->name('users.destroy');
	
	// users - Email Address or Phone Number verification
	$router->pattern('field', 'email|phone');
	$router->pattern('token', '.*');
	Route::get('{id}/verify/resend/email', 'UserController@reSendEmailVerification');
	Route::get('{id}/verify/resend/sms', 'UserController@reSendPhoneVerification');

	Route::get('{id}/verify/verfied/user', 'UserController@verifiedUserVerification');

	Route::get('verify/{field}/{token?}', 'UserController@verification');
});

// posts
Route::group(['prefix' => 'posts'], function ($router) {
	$router->pattern('id', '[0-9]+');
	
	Route::get('/', 'PostController@index')->name('posts.index');
	Route::get('{id}', 'PostController@show')->name('posts.show');
	Route::post('/', 'PostController@store')->name('posts.store');
	Route::group(['middleware' => ['auth:sanctum']], function ($router) {
		$router->pattern('ids', '[0-9,]+');
		
		Route::put('{id}', 'PostController@update')->name('posts.update');
		Route::delete('{ids}', 'PostController@destroy')->name('posts.destroy');
	});
	
	// posts - Email Address or Phone Number verification
	$router->pattern('field', 'email|phone');
	$router->pattern('token', '.*');
	Route::get('{id}/verify/resend/email', 'PostController@reSendEmailVerification');
	Route::get('{id}/verify/resend/sms', 'PostController@reSendPhoneVerification');
	Route::get('verify/{field}/{token?}', 'PostController@verification');
});

// savedPosts
Route::group(['prefix' => 'savedPosts'], function ($router) {
	Route::group(['middleware' => ['auth:sanctum']], function ($router) {
		$router->pattern('ids', '[0-9,]+');
		
		Route::get('/', 'SavedPostController@index')->name('savedPosts.index');
		Route::delete('{ids}', 'SavedPostController@destroy')->name('savedPosts.destroy');
	});
});

// savedSearches
Route::group(['prefix' => 'savedSearches'], function ($router) {
	Route::group(['middleware' => ['auth:sanctum']], function ($router) {
		$router->pattern('ids', '[0-9,]+');
		
		Route::get('/', 'SavedSearchController@index')->name('savedSearches.index');
		Route::delete('{ids}', 'SavedSearchController@destroy')->name('savedSearches.destroy');
	});
});

// pictures
Route::group(['prefix' => 'pictures'], function ($router) {
	$router->pattern('id', '[0-9]+');
	
	Route::get('{id}', 'PictureController@show')->name('pictures.show');
	Route::post('/', 'PictureController@store')->name('pictures.store');
	Route::delete('{id}', 'PictureController@destroy')->name('pictures.destroy');
	Route::post('reorder', 'PictureController@reorder')->name('pictures.reorder'); // Bulk Update
});
Route::group(['prefix' => 'posts'], function ($router) {
	$router->pattern('postId', '[0-9]+');
	
	Route::get('{postId}/pictures', 'PictureController@index')->name('posts.pictures');
});

// packages
Route::group(['prefix' => 'packages'], function ($router) {
	$router->pattern('id', '[0-9]+');
	
	Route::get('/', 'PackageController@index')->name('packages.index');
	Route::get('{id}', 'PackageController@show')->name('packages.show');
});

// paymentMethods
Route::group(['prefix' => 'paymentMethods'], function ($router) {
	$router->pattern('id', '[0-9a-z]+');
	
	Route::get('/', 'PaymentMethodController@index')->name('paymentMethods.index');
	Route::get('{id}', 'PaymentMethodController@show')->name('paymentMethod.show');
});

// payments
Route::group(['prefix' => 'payments'], function ($router) {
	Route::group(['middleware' => ['auth:sanctum']], function ($router) {
		$router->pattern('id', '[0-9]+');
		
		Route::get('/', 'PaymentController@index')->name('payments.index');
		Route::get('{id}', 'PaymentController@show')->name('payments.show');
		
		Route::group(['prefix' => 'posts'], function ($router) {
			$router->pattern('postId', '[0-9]+');
			
			Route::get('{postId}/payments', 'PaymentController@index')->name('posts.payments');
		});
	});
	
	Route::post('/', 'PaymentController@store')->name('payments.store');
});

// threads
Route::group(['prefix' => 'threads', 'middleware' => ['auth:sanctum']], function ($router) {
	$router->pattern('id', '[0-9]+');
	$router->pattern('ids', '[0-9,]+');
	
	Route::get('/', 'ThreadController@index')->name('threads.index');
	Route::get('{id}', 'ThreadController@show')->name('threads.show');
	Route::post('/', 'ThreadController@store')->name('threads.store');
	Route::put('{id}', 'ThreadController@update')->name('threads.update');
	Route::delete('{ids}', 'ThreadController@destroy')->name('threads.destroy');
	
	Route::post('bulkUpdate/{ids?}', 'ThreadController@bulkUpdate')->name('threads.bulkUpdate'); // Bulk Update
});

// pages
Route::group(['prefix' => 'pages'], function ($router) {
	$router->pattern('slugOrId', '.+');
	
	Route::get('/', 'PageController@index')->name('pages.index');
	Route::get('{slugOrId}', 'PageController@show')->name('pages.show');
});

// contact
Route::group(['prefix' => 'contact'], function ($router) {
	Route::post('/', 'ContactController@sendForm')->name('contact');
});
Route::group(['prefix' => 'posts'], function ($router) {
	$router->pattern('id', '[0-9]+');
	
	Route::post('{id}/report', 'ContactController@sendReport')->name('posts.report');
});

// settings
Route::group(['prefix' => 'settings'], function ($router) {
	$router->pattern('key', '.+');
	
	Route::get('/', 'SettingController@index')->name('settings.index');
	Route::get('{key}', 'SettingController@show')->name('settings.show');
});

// homeSections
Route::group(['prefix' => 'homeSections'], function ($router) {
	Route::get('/', 'HomeSectionController@index')->name('homeSections.index');
});

// captcha
Route::group(['prefix' => 'captcha'], function ($router) {
	Route::get('/', 'CaptchaController@getCaptcha')->name('captcha.getCaptcha');
});



// fallback
Route::any('{any}', function () {
	return response()->json([
		'success' => false,
		'message' => 'Page Not Found.',
	], 404);
})->where('any', '.*')->name('any.other');


// ajax request
Route::group(['prefix' => 'ajax'], function ($router) {
	$router->pattern('id', '[0-9]+');
	$router->pattern('slugOrId', '.+');
	
	Route::get('select-sub-category', 'CategoryController@getsubcatgories')->name('categories.getsubcatgories');
	Route::get('{slugOrId}', 'CategoryController@show')->name('categories.ajax.show');
	Route::post('{id}/fields', 'CategoryController@getCustomFields')->name('categories.ajax.fields');
});