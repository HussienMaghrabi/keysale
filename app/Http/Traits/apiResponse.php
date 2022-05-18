<?php namespace App\Traits;

trait apiResponse
{
    protected function apiResponse($request, $message, $data, $successStatus)
    {
        $response['message'] = $message;
        if ($data != null)
            $response['data'] = $data;
        $response['success'] = $successStatus;
        return $response;
    }
}
