<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class TaskController extends Controller
{

    public function index(): Factory|View
    {
        $tasks = DB::table('tasks')->get();

        return view('tasks', compact('tasks'));
    }

    public function create(Request $request)
{
    $request->validate([
        'name' => 'required|max:10'
    ]);

    DB::table('tasks')->insert([
        'name' => $request->name
    ]);

    return redirect()->back();
}

    public function destroy($id): Redirector|RedirectResponse
    {
        $task = Task::find($id);

        $task->delete();

        return redirect()->back();
    }

    public function edit($id): Factory|View
    {
        $task = DB::table('tasks')->where('id', '=', $id)->first();

        $tasks = DB::table('tasks')->get();

        return view('tasks', compact('task', 'tasks'));
    }

    public function update(Request $request): Redirector|RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:10'
        ]);

        $task = Task::find($request->id);

        $task->name = $request->name;

        $task->save();

        return redirect('tasks');
    }

}
