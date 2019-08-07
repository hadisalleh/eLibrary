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

// Route::get('/', function () {
//     return view('welcome');
// })->name('index');

// Route::get('about', function () {
//     return view('about');
// });

// Route::get('contact', function () {
//     return view('contact');
// });

// sama seperti diatas
Route::view('about', 'about')->name('about');
// Route::view('contact', 'contact')->name('contact');

//pass data ke view guna route
Route::get('/', function () {
    $person = 'Ahmad Albab';

    return view('welcome')->withPerson($person);
})->name('index');


// route untuk controller
Route::get('contact', 'PageController@contact')->name('contact');
Route::get('detail', 'PageController@detail')->name('detail');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// route untuk restful controller
Route::resource('book', 'BookController');

Route::get('/borrow/{borrow}/{flag}/edit', [
    'uses' => 'BorrowController@edit'
])->name('borrow.edit');

Route::resource('borrow', 'BorrowController')->except(['edit']);
