<?php
namespace App\Http\Responses;

use App\Http\Resources\UserResource;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class CustomLoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = $request->user() ?? $request->user;

        $user->tokens()->where('name', 'mobile_token')->delete();
        $token = $user->createToken('mobile_token');

        $message = $user->hasVerifiedEmail()
            ? 'Login successful.'
            : 'Login successful, please verify your email.';

        return response()->json([
            'message' => $message,
            'user' => new UserResource($user),
            'token' => $token->plainTextToken
        ]);
    }

}
