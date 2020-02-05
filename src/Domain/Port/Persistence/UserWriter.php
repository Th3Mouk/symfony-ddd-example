<?php

namespace Domain\Port\Persistence;

use Domain\Collection\UserCollection;

interface UserWriter
{
    public function write(UserCollection $user_collection): void;
}
