<?php

declare(strict_types=1);

namespace App\View;

use Domain\Aggregates\User;
use Domain\Collection\UserCollection;

final class UserCollectionView
{
    public function normalize(UserCollection $user_collection): array
    {
        $user_view = new UserView();
        $users = [];

        /** @var User $user_object */
        foreach ($user_collection->all() as $user_object) {
            array_push($users, $user_view->normalize($user_object));
        }

        return $users;
    }
}
