<?php

namespace Src\BoundedContext\Product\Application\ViewModel\Product;

use Illuminate\Http\JsonResponse;

class GetByIdProductViewModel extends JsonResponse
{
    public function response($request)
    {
        return $request;
    }
}
