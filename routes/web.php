<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskControl;

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

Route::get('/', [TaskControl::class, 'show']);

Route::post('/', [TaskControl::class, 'addTask']);

Route::get('/done/{id}', [TaskControl::class, 'finishTask']);

Route::get('/update/{id}', [TaskControl::class, 'updateTask']);

Route::get('/delete/{id}', [TaskControl::class, 'deleteTask']);

