<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class TestApiController extends Controller
{
    use ApiResponseTrait;
    public function test($name)
    {

        try{
            $title=Title::get();
            
        }
        catch(\Throwable $error){
            return $this->ApiResponse(500,'name is incorrect',$error->getMessage());
        }
    }
    
}
