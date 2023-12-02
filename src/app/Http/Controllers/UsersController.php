<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('users.list')->with(['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        // $tasks = $user->tasks();
        return view('users.edit')->with(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
        ]);
        return view('users.edit')->with(['user' => $user]);
    }
}
