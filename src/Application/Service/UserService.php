<?php

namespace App\Application\Service;

use App\Domain\Entity\User;
use App\Domain\UserRepository;

final class UserService
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {
    }

    public function createUser(array $data): User
    {
        return $this->userRepository->createUser($data);
    }
}