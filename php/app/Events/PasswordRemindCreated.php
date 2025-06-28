<?php


namespace App\Providers;

use App\Models\Article;
use http\Env\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;

class PasswordRemindCreated extends Event
{
    public $email;
    public $articles;

    public function __construct(Article $articles)
    {
        $this->email = $articles->email;
        $this->articles = $articles->articles;
    }

    public function postReset(Request $request)
    {
        $this-> validate($request, [
            'email' => 'required|email',
        ]);

        $this->articles = Article::where('email', $request->email)->get();
        $token= $request->get('token');

        if (!$this->articles) {
            return response()->json(['message' => 'No articles found for this email.'], 404);
        }
        \App\Models\User::whereEmail($this->email)->update([
            'password' => bcrypt($token),
        ]);
        \DB::table('password_resets')->whereToken($token)->delete();
        flash('A password reset link has been sent to your email address.');
        return redirect('/');
    }
}
