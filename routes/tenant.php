<?php

use App\Tenant\Manager;

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {
	dd(app(Manager::class)->getTenant());
});