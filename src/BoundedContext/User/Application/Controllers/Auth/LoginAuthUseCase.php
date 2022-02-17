<?php

namespace Src\BoundedContext\User\Application\Controllers\Auth;

use Src\BoundedContext\User\Domain\User\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserPassword;

final class LoginAuthUseCase
{
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $userName, string $userPassword)
    {
        $name = new UserName($userName);
        $password = new UserPassword($userPassword);

        $login = $this->repository->login($name, $password);

        return $login;
    }

}
