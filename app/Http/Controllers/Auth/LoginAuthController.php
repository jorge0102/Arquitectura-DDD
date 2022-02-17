<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Src\BoundedContext\User\Application\Requests\Auth\LoginAuthRequest;
use Src\BoundedContext\User\Application\ViewModel\Auth\LoginAuthViewModel;

class LoginAuthController extends Controller
{
     /**
     * @var \Src\BoundedContext\User\Infrastructure\User\LoginAuthController
     */
    private $loginAuthController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\User\LoginAuthController $loginAuthController)
    {
        $this->loginAuthController = $loginAuthController;
    }

     /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginAuthRequest $request)
    {
        $request->validated();

        $token = $this->loginAuthController->__invoke($request);

        $response = new LoginAuthViewModel();

        return $response->response($token);
    }
}
