<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{

    public function index(): Factory|View
    {
        $users = DB::table('users')->get();

        return view('users', compact('users'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users'
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => '123456'
        ]);

        return redirect()->back();
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back();
    }

    public function edit($id): Factory|View
    {
        $user = DB::table('users')->where('id', '=', $id)->first();

        $users = DB::table('users')->get();

        return view('users', compact('user', 'users'));
    }

    public function update(Request $request): Redirector|RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email'
        ]);

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect('users');
    }

}
