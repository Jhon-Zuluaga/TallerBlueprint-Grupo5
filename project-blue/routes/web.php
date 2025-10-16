<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::resource('users', App\Http\Controllers\UserController::class)->except('show');

Route::resource('projects', App\Http\Controllers\ProjectController::class)->except('show');

Route::resource('tasks', TaskController::class);

Route::resource('project_users', App\Http\Controllers\Project_userController::class)->except('show');


