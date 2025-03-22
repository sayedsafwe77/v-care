<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiUnifiedResponseTrait;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    use ApiUnifiedResponseTrait;
    public function test($name)
    {
        return $this->testTrait();
    }
    
}
