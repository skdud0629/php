<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except' => ['destroy']]);
    }
    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();
        flash('You have been logged out.')->success();

        return redirect()->route('articles.index');
    }

    public function store(Request $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            flash('Login failed. Please check your credentials and try again.')->error();
            return redirect()->back()->withInput();
        }
    }

    protected function respondError($message)
    {
        flash()->error($message);
        return redirect()->back()->withInput();
    }
}
