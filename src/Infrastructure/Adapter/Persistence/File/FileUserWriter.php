<?php

declare(strict_types=1);

namespace Infra\Adapter\Persistence\File;

use Domain\Collection\UserCollection;
use Domain\Port\Persistence\UserWriter;

final class FileUserWriter implements UserWriter
{
    public function write(UserCollection $user_collection): void
    {
    }
}
