<?php

declare(strict_types=1);

namespace Domain\Collection;

use Domain\Aggregates\User;

final class UserCollection implements \Countable
{
    /** @var array<User> */
    private array $users = [];

    public function add(User $user): self
    {
        array_push($this->users, $user);

        return $this;
    }

    /**
     * @return \Traversable<User>
     */
    public function all(): \Traversable
    {
        foreach ($this->users as $user) {
            yield $user;
        }
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->users);
    }
}
