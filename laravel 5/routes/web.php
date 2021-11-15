<?php


Route::resource('UT5_2', 'UT5_2Controller');
Route::get('UT5_2/{UT5_2}/pdf', 'UT5_2Controller@pdf');

Route::get('UT5_2/{UT5_2}/productos', 'UT5_2Controller@productos');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');