<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Src\BoundedContext\User\Application\Requests\User\CreateUserRequest;
use Src\BoundedContext\User\Application\ViewModel\User\CreateUsersViewModel;

class CreateUserController extends Controller
{
    /**
     * @var \Src\BoundedContext\User\Infrastructure\User\CreateUserController
     */
    private $createUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\User\CreateUserController $createUserController)
    {
        $this->createUserController = $createUserController;
    }

    public function __invoke(CreateUserRequest $request)
    {
        $request->validated();

        return new CreateUsersViewModel($this->createUserController->__invoke($request));
    }
}
