<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{

public function index(): Factory|View{

$users = DB::table(table:'users')->get();

return view(view:'users', data: compact(var_name:'users'));

}

public function create(){

DB::table('users')->insert([
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'password' => '123456'
]);

return redirect()->back();

}

public function destroy($id): Redirector|RedirectResponse{

DB::table(table:'users')->where(column:'id', operator:$id)->delete();

return redirect()->back();

}

public function edit($id): Factory|View{

$user = DB::table(table:'users')->where(column:'id', operator:$id)->first();

$users = DB::table(table:'users')->get();

return view('users', compact('user', 'users'));

}

public function update($id): Redirector|RedirectResponse {

$id = $_POST['id'];

DB::table('users')
->where('id', '=', $id)
->update([
'name' => $_POST['name'],
'email' => $_POST['email']
]);

return redirect(to:'users');

}

}
