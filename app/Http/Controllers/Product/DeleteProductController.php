<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use Src\BoundedContext\Product\Application\ViewModel\Product\DeleteProductViewModel;

class DeleteProductController
{
    /**
     * @var \Src\BoundedContext\Product\Infrastructure\Product\DeleteProductController
     */
    private $deleteProductController;

    public function __construct(\Src\BoundedContext\Product\Infrastructure\Product\DeleteProductController $deleteProductController)
    {
        $this->deleteProductController = $deleteProductController;
    }

    public function __invoke(Request $request)
    {
        $this->deleteProductController->__invoke($request);

        $response = new DeleteProductViewModel();

        return $response->response();
    }
}
