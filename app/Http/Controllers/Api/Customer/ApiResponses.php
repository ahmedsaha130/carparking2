<?php


namespace App\Http\Controllers\Api\Customer;


trait ApiResponses
{
    public function apiResponse($data = null, $message = null, $status = null)
    {

        $array = [
            'data' => $data,
            'message' => $message,
            'status' => $status,
        ];
        return response($array, 200);
    }
}




