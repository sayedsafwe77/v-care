<?php

namespace App;

trait ApiResponse
{
    protected function successResponse($data,$message = "Success",$status = 200){
        return response()->json([
            'success' => true,
        'message' => $message,
            'data' => $data
        ],$status);
    }
    protected function createdResponse($data,$message = "Success"){
        return response()->json([
            'success' => true,
        'message' => $message,
            'data' => $data
        ],201);
    }
    protected function errorResponse($message,$status = 400){
        return response()->json([
            'success' => false,
            'message' => $message,
        ],$status);
    }

    protected function responseNotFound($message = "Not Found")
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 404);
    }

    protected function responseServerError($message = "Internal Server Error")
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 500);
    }

    protected function responseNotContent($message = "Not Content Found")
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 204);
    }
}
