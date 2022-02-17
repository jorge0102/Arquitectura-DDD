<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Infrastructure\User;

use Illuminate\Http\Request;
use Src\BoundedContext\User\Application\Controllers\Auth\LoginAuthUseCase;
use Src\BoundedContext\User\Infrastructure\User\Repositories\EloquentUserRepository;

final class LoginAuthController
{
    private $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $userName       = $request->input('name');
        $userPassword   = $request->input('password');

        $login = new LoginAuthUseCase($this->repository);

        return $login->__invoke($userName, $userPassword);
    }
}
