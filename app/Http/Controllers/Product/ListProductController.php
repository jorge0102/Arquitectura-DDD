<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Src\BoundedContext\Product\Application\ViewModel\Product\GetAllByUserProductViewModel;

class ListProductController extends Controller
{
    /**
     * @var \Src\BoundedContext\Product\Infrastructure\Product\ListProductController
     */
    private $listProductController;

    public function __construct(\Src\BoundedContext\Product\Infrastructure\Product\ListProductController $listProductController)
    {
        $this->listProductController = $listProductController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $products = $this->listProductController->__invoke(Auth::id());

        $response = new GetAllByUserProductViewModel();

        return $response->response($products);
    }
}
