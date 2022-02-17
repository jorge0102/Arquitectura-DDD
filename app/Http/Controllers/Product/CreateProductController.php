<?php

namespace App\Http\Controllers\Product;

use Src\BoundedContext\Product\Application\Requests\Product\CreateProductRequest;
use Src\BoundedContext\Product\Application\ViewModel\Product\CreateProductViewModel;

class CreateProductController
{
    /**
     * @var \Src\BoundedContext\Product\Infrastructure\Product\CreateProductController
     */
    private $createProductController;

    public function __construct(\Src\BoundedContext\Product\Infrastructure\Product\CreateProductController $createProductController)
    {
        $this->createProductController = $createProductController;
    }

    public function __invoke(CreateProductRequest $request)
    {
        $request->validated();

        $this->createProductController->__invoke($request);

        $response = new CreateProductViewModel();

        return $response->response();
    }
}
