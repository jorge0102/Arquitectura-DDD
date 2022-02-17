<?php

namespace Src\BoundedContext\Product\Application\ViewModel\Product;

use Illuminate\Http\JsonResponse;

class DeleteProductViewModel extends JsonResponse
{
    public function response(): array
    {
        return [
            'data' => [
                'message' => 'success'
            ],
        ];
    }
}
