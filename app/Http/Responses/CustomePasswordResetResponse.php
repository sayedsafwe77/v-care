<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\PasswordResetResponse as PasswordResetResponseContract;

class CustomePasswordResetResponse implements PasswordResetResponseContract
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function toResponse($request)
    {
        return new JsonResponse([
            'message' => trans($this->status),
        ], 200);
    }
}
