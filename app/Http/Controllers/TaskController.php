<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class TaskController extends Controller
{

public function index(): Factory|View{

$tasks =DB::table(table:'tasks')->get();
return view( view:'tasks',data :compact(var_name:'tasks') );

}

public function create(){

$task_name=$_POST['name'];

DB::table('tasks')->insert(['name' => $task_name
]);

return redirect()->back();

}

public function destroy($id): Redirector|RedirectResponse{

DB::table(table:'tasks')->where(column:'id', operator:$id)->delete();

return redirect()->back();

}

public function edit($id): Factory|View{

$task = DB::table(table:'tasks')->where(column:'id', operator:$id)->first();

$tasks = DB::table(table:'tasks')->get();

return view('tasks', compact('task', 'tasks'));

}

public function update($id): Redirector|RedirectResponse {

$id = $_POST['id'];

DB::table('tasks')->where('id', '=', $id)->update(['name' => $_POST['name']
]);

return redirect(to:'tasks');

}

}
