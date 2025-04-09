<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponseTrait;

class TestApiController extends Controller
{
  use ApiResponseTrait;
  public function test($name)
  {
    if ($name == 'hello') {

      return $this->ApiResponse(200, 'done', null, $name);
    } else {
      return $this->ApiResponse(422, 'validation error', 'name must be hello');
    }
  }

  public function user()
  { 
    $user = User::first();
    return $this->ApiResponse(200,data: $user  );
  }
}
