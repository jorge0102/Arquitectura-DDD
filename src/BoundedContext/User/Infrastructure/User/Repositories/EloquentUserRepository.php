<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Infrastructure\User\Repositories;

use App\Models\User as EloquentUserModel;
use Illuminate\Support\Facades\Auth;
use Src\BoundedContext\User\Domain\User\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User\User;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserId;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserPassword;
use Src\BoundedContext\User\Domain\User\ValueObjects\UserRememberToken;

final class EloquentUserRepository implements UserRepositoryContract
{
    private $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }

    public function all()
    {
        $users = $this->eloquentUserModel->get();

        return $users;
    }

    public function find(UserId $id): ?User
    {
        $user = $this->eloquentUserModel->findOrFail($id->value());

        // Return Domain User model
        return new User(
            new UserName($user->name),
            new UserEmail($user->email),
            new UserEmailVerifiedDate($user->email_verified_at),
            new UserPassword($user->password),
            new UserRememberToken($user->remember_token)
        );
    }

    public function findByCriteria(UserName $name, UserEmail $email): ?User
    {
        $user = $this->eloquentUserModel
            ->where('name', $name->value())
            ->where('email', $email->value())
            ->firstOrFail();

        return new User(
            new UserName($user->name),
            new UserEmail($user->email),
            new UserEmailVerifiedDate($user->email_verified_at),
            new UserPassword($user->password),
            new UserRememberToken($user->remember_token)
        );
    }

    public function save(User $user): void
    {
        $newUser = $this->eloquentUserModel;

        $data = [
            'name'              => $user->name()->value(),
            'email'             => $user->email()->value(),
            'email_verified_at' => $user->emailVerifiedDate()->value(),
            'password'          => $user->password()->value(),
            'remember_token'    => $user->rememberToken()->value(),
        ];

        $newUser->create($data);
    }

    public function update(UserId $id, User $user): void
    {
        $userToUpdate = $this->eloquentUserModel;

        $data = [
            'name'  => $user->name()->value(),
            'email' => $user->email()->value(),
        ];

        $userToUpdate
            ->findOrFail($id->value())
            ->update($data);
    }

    public function delete(UserId $id): void
    {
        $this->eloquentUserModel
            ->findOrFail($id->value())
            ->delete();
    }

    public function login(UserName $userName, UserPassword $userPassword): string
    {
        if (Auth::attempt(['name' => $userName->value(), 'password' => $userPassword->value()])) {
            $user = Auth::user();

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            return $token;
        }

        return 'Unauthorized';
    }
}
