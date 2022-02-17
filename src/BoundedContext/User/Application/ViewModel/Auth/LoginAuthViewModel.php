<?php

namespace Src\BoundedContext\User\Application\ViewModel\Auth;

use Illuminate\Http\JsonResponse;

class LoginAuthViewModel extends JsonResponse
{
    public function response($request)
    {
        return [
            'accessToken' => $request,
            'token_type' => 'Bearer',
        ];
    }
}
