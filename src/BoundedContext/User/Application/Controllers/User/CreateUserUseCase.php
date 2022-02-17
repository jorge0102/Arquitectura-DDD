<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Controllers\User;

use DateTime;
use Src\BoundedContext\User\Domain\User\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User\User;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserPassword;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserRememberToken;

final class CreateUserUseCase
{
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $userName,
        string $userEmail,
        ?DateTime $userEmailVerifiedDate,
        string $userPassword,
        ?string $userRememberToken
    ): void
    {
        $name              = new UserName($userName);
        $email             = new UserEmail($userEmail);
        $emailVerifiedDate = new UserEmailVerifiedDate($userEmailVerifiedDate);
        $password          = new UserPassword($userPassword);
        $rememberToken     = new UserRememberToken($userRememberToken);

        $user = User::create($name, $email, $emailVerifiedDate, $password, $rememberToken);

        $this->repository->save($user);
    }
}
