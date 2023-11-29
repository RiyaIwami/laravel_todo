<?php

namespace App\Http\Controllers;

// use App\Models\User;

class UsersController extends Controller
{
    public function registration()
    {
        // $users = User::all();
        return view('users.registration');
    }
}
