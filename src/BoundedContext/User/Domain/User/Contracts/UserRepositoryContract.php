<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Domain\User\Contracts;

use Src\BoundedContext\User\Domain\User\User;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserId;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserPassword;

interface UserRepositoryContract
{
    public function all();

    public function find(UserId $id): ?User;

    public function findByCriteria(UserName $userName, UserEmail $userEmail): ?User;

    public function save(User $user): void;

    public function update(UserId $userId, User $user): void;

    public function delete(UserId $id): void;

    public function login(UserName $userName, UserPassword $userPassword): string;
}
