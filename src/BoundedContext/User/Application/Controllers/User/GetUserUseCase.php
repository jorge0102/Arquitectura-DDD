<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Controllers\User;

use Src\BoundedContext\User\Domain\User\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User\User;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserId;

final class GetUserUseCase
{
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $userId): ?User
    {
        $id = new UserId($userId);

        $user = $this->repository->find($id);

        return $user;
    }
}
