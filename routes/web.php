<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function (): Factory|View {

    $name = 'ansam';

    $departments = [
        '01' => 'Tichnical',
        '2'  => 'financial',
        '3'  => 'Sales'
    ];

    // return view('about', ['name' => $name]);
    // return view('about')->with('name', $name);

    return view('about', compact('name', 'departments'));
});

Route::post('/about', function (): Factory|View {

    $name = $_POST['name'];

    $departments = [
        '01' => 'Tichnical',
        '2'  => 'financial',
        '3'  => 'Sales'
    ];

    return view('about', compact('name'));
});

Route::get('tasks', [TaskController::class, 'index']);

Route::post('create', [TaskController::class, 'create']);

Route::post('/delete/{id}', [TaskController::class, 'destroy']);

Route::post('edit/{id}', [TaskController::class, 'edit']);

Route::post('update', [TaskController::class, 'update']);

Route::get('users', [UserController::class, 'index']);

Route::post('user/create', [UserController::class, 'create']);

Route::post('user/delete/{id}', [UserController::class, 'destroy']);

Route::post('user/edit/{id}', [UserController::class, 'edit']);

Route::post('user/update', [UserController::class, 'update']);

Route::get(uri:'app',action: function() :view{
return view('layouts.app');

});
