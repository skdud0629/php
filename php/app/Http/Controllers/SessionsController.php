<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except' => ['destroy']];)
    }
    public function create()
    {
        return view('sessions.create');
    }
}
