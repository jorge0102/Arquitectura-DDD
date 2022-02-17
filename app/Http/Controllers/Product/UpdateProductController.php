<?php

namespace App\Http\Controllers\Product;

use Src\BoundedContext\Product\Application\Requests\Product\UpdateProductRequest;
use Src\BoundedContext\Product\Application\ViewModel\Product\UpdateProductViewModel;

class UpdateProductController
{
    /**
     * @var \Src\BoundedContext\Product\Infrastructure\Product\UpdateProductController
     */
    private $updateProductController;

    public function __construct(\Src\BoundedContext\Product\Infrastructure\Product\UpdateProductController $updateProductController)
    {
        $this->updateProductController = $updateProductController;
    }

    public function __invoke(UpdateProductRequest $request)
    {
        $request->validated();

        $this->updateProductController->__invoke($request);

        $response = new UpdateProductViewModel();

        return $response->response();
    }
}
