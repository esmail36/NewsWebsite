<?php

namespace App\Exceptions;

use Facade\FlareClient\Http\Response;
use Illuminate\Auth\AuthenticationException;
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

    public function unauthentticsted($request , AuthenticationException $exception){

        if(request()->exceptsJson()){
            return Response()->json(['error' => 'UnAuthorized'] , 401);  // exception for api
        }

        $guard = data_get($exception->guards() , 0);
        switch($guard) {
            case 'visitor':
                $login = 'login';
            break;
            
            
            default:
            $login = 'cms/admin/admin-login';
            break;
        }
        return redirect()->guest(route($login));
    }
}
