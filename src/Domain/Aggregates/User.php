<?php

declare(strict_types=1);

namespace Domain\Aggregates;

use Domain\Identifier\UserIdentifier;
use Domain\ValueObject\PersonalIdentity;

final class User
{
    private UserIdentifier $id;

    private PersonalIdentity $personal_identity;

    private function __construct(PersonalIdentity $personal_identity)
    {
        $this->id = UserIdentifier::create();
        $this->personal_identity = $personal_identity;
    }

    public static function create(PersonalIdentity $personal_identity):self
    {
        return new self($personal_identity);
    }

    public function id(): UserIdentifier
    {
        return $this->id;
    }

    public function personal_identity(): PersonalIdentity
    {
        return $this->personal_identity;
    }
}
