<?php

namespace App\Exceptions;

use BadMethodCallException;
use Facade\FlareClient\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use InvalidArgumentException;
use PDO;
use PDOException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     * 
     * 
     */

    public function render($request, Throwable $exception)
    {
        if($exception instanceof MethodNotAllowedHttpException){
            return response()->json([
                'error' => $exception->getMessage()
            ], 500);
        }
        if($exception instanceof BadMethodCallException){
            return response()->json([
                'error' => $exception->getMessage()
            ], 500);
        }

        if($exception instanceof InvalidArgumentException){
            return response()->json([
                'error' => $exception->getMessage()
            ], 500);
        }
        if ($exception instanceof QueryException) {
            // example algo for make response
            return response()->json(['message' => 'something is wrong'], 500);
        }

        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Data not found'
            ], 404);
        }
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'error' => 'route not found'
            ], 404);
        }

        return parent::render($request, $exception);
    }

    public function report(Throwable $exception)
    {
        
        if (app()->bound('sentry') && $this->shouldReport($exception)) {
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }
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
}
