<?php

namespace Domain\Port\Persistence;

use Domain\Aggregates\User;
use Domain\Collection\UserCollection;

interface UserReader
{
    public function read(): UserCollection;
    public function get(): User;
}
