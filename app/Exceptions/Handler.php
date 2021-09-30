<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException; //Dont forget to import this class
use Illuminate\Support\Arr; //EDBYDOS - https://github.com/DevMarketer/multiauth_tutorial/issues/29
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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

    /**
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */

     protected function unauthenticated($request, AuthenticationException $exception){
         if($request->expectsJson()){
             return response()->json(['message' => $exception->getMessage()], 401);
         }
         $guard = Arr::get($exception->guards(), 0); //EDBYDOS
         switch($guard){
             case 'admin':
                $login = 'admin.auth.login'; //EDBYDOS
                break;
            default:
                $login = 'login';
                break;
         }
         return redirect()->guest(route($login));
     }
}
