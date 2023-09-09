<?php

namespace App\Services;

class JsonResponse {

    public static function sendResponse(Array $data,String $message = null)
    {
        $data = ['type'=>'success','data'=> $data,'message' => $message];

        return response()->json($data,200);
    }

    public static function sendError(Array $data,String $message = null , int $code = 404)
    {
        $data = ['type'=>'error','data'=> $data,'message' => $message];

        return response()->json($data,$code);
    }
}