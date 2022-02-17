<?php

namespace Src\BoundedContext\User\Application\ViewModel\User;

use Illuminate\Http\JsonResponse;

class ListUsersViewModel extends JsonResponse
{
    public function response($request)
    {
        return $request;
    }
}
