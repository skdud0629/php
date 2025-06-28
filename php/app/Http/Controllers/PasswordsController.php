<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PasswordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getRemind()
    {
        return view('passwords.remind');
    }

    public function postRemind(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $email = $request->input('email');
        $token = str_random(60);

        \DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now(),
        ]);

        \Mail::send('emails.remind', ['token' => $token], function ($message) use ($email) {
            $message->to($email)
                    ->subject('Password Reset Notification');
        });
        flash('A password reset link has been sent to your email address.')->success();
        return redirect('/');
    }

    public function getReset($token = null)
    {
        if (!$token) {
            flash('Invalid password reset token.')->error();
            return redirect()->route('password.remind');
        }
        return view('passwords.reset', ['token' => $token]);
    }

    public function postReset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ]);

        $email = $request->input('email');
        $token = $request->input('token');

        $passwordReset = \DB::table('password_resets')->where('email', $email)->where('token', $token)->first();

        if (!$passwordReset) {
            flash('Invalid password reset token.')->error();
            return redirect()->route('password.remind');
        }

        $user = \App\Models\User::where('email', $email)->first();
        if (!$user) {
            flash('User not found.')->error();
            return redirect()->route('password.remind');
        }

        $user->password = bcrypt($request->input('password'));
        $user->save();

        \DB::table('password_resets')->where('email', $email)->delete();

        flash('Your password has been reset successfully.')->success();
        return redirect()->route('login');
    }

}
