<?php

declare(strict_types=1);

namespace App\Controller;

use Domain\Aggregates\User;
use Domain\Collection\UserCollection;
use Domain\Port\Persistence\UserReader;

final class UserController
{
    public function all(UserReader $reader): UserCollection
    {
        return $reader->read();
    }

    public function get(UserReader $reader): User
    {
        return $reader->get();
    }
}
