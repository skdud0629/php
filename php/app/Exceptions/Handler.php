<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $e)
    {
        return parent::render($e);
    }

    public function render($request, Throwable $e)
    {
        if( app()->environment('production')){
            if ($e instanceof \Illuminate\Database\QueryException) {
                return response()->json(['error' => 'Database error'], 500);
            }

            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['error' => 'Resource not found'], 404);
            }

            return response(['error' => 'An unexpected error occurred'], 500)
                ->header('Content-Type', 'application/json');
        }

        return parent::render($request, $e);
    }
}
