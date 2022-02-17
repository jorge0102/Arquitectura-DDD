<?php

namespace Src\BoundedContext\User\Application\Controllers\User;

use Src\BoundedContext\User\Domain\User\Contracts\UserRepositoryContract;

final class GetAllUserUseCase
{
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $users = $this->repository->all();

        return $users;
    }
}
