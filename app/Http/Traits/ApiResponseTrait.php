<?php

namespace App\Http\Traits;

trait ApiResponseTrait
{
    public function ApiResponse($code = 200, $message= null, $errors = null, $data = null){
       $array = [
        'status'=> $code,
        'message' => $message 
       ]; 
       if(is_null($data)&& !is_null($errors)){
            $array['errors'] = $errors;
       }else if(is_null($errors) && !is_null($data)){
            $array['data'] = $data;
       }

       return response($array,200);
    }
}
