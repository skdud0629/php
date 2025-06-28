<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function execute(Request $request, $provider)
    {
       if (! $request->has('code')){
           return $this->redirectToProvider($provider);
       }
       return $this->handleProviderCallback($provider, $request);
    }
    protected function redirectToProvider($provider)
    {
        return \Socialite::driver($provider)->redirect();
    }
    protected function handleProviderCallback($provider, Request $request)
    {
        try {
            $user = \Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            flash('Failed to authenticate with ' . $provider)->error();
            return redirect()->route('login');
        }

        // Handle user authentication logic here
        // For example, find or create a user in your database

        flash('Successfully authenticated with ' . $provider)->success();
        return redirect()->route('home');
    }


}
