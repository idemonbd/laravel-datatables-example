<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

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

Route::view('users', 'users.index');


/* 
* Create user by using factory from the url
* Like localhost/factory/users/1000
* 1000 will create 1000 users in users table
*/
Route::get('factory/users/{count}', function ($count = 100) {
    User::factory($count)->create();
    echo $count.' users created successfully';
    echo `<a href="{{ url('users') }}">Go to Users List</a>`;
});
