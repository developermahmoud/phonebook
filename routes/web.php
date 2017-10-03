<?php
Route::get('/', function () {
    return view('phonebook');
});
Route::resource('phonebook','PhonebookController');
Route::get('getData','PhonebookController@getData');
