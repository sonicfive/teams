<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});