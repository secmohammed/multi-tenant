<?php

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::resource('companies', 'CompanyController');
Route::get('/tenant/{company}', 'TenantController@switch')->name('tenant.switch');