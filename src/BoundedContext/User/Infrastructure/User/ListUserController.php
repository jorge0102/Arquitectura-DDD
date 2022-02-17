<?php

namespace Src\BoundedContext\User\Infrastructure\User;

use Src\BoundedContext\User\Application\Controllers\User\GetAllUserUseCase;
use Src\BoundedContext\User\Infrastructure\User\Repositories\EloquentUserRepository;

final class ListUserController
{
    private $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $users = new GetAllUserUseCase($this->repository);

        return $users->__invoke();
    }
}
