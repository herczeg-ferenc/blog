<?php

namespace App\Domain;

use App\Domain\Entity\User;

interface UserRepository
{
    public function createUser(array $data): User;
}