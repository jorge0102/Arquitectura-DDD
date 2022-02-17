<?php

namespace Src\BoundedContext\Product\Application\ViewModel\Product;

use Illuminate\Http\JsonResponse;

class GetAllByUserProductViewModel extends JsonResponse
{
    public function response($request)
    {
        return $request;
    }
}
