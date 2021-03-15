<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result)

    {
    	$response = [
            'success' => true,
            'data'    => $result,

        ];
        return response()->json($response, 200);

    }
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}
