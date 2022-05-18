<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception)
    {
        if ($request->api_token) {
            if ($exception instanceOf ValidationException) {
                $errors = $exception->errors();
                foreach ($errors as $error) {
                    $data['message'] = $error[0];
                }
            } else
                $data['message'] = $exception->getMessage();
            $data['success'] = false;
            return response()->json($data, 200);
        }
//        else{
//            $data['success'] = false;
//            $data['authenticated'] = false;
//            return response()->json($data, 200);
//        }
        return parent::render($request, $exception);
    }
}
