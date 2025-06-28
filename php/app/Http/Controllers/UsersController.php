<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//$articles = \App\Models\Article::with('user')->get();


class UsersController extends Controller
{

    public function confirm(){
        $user = \App\Models\User::with('articles')->get();
        if($user->isEmpty()) {
            return redirect()->route('users.index')->with('message', 'No users found.');
        }
        return view('users.confirm', ['users' => $user]);
    }


    public function create()
    {

        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = \App\Models\User::create($data);

        return redirect()->route('users.show', ['user' => $user->id]);
    }
}
