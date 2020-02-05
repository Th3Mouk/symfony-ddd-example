<?php

declare(strict_types=1);

namespace App\View;

use Domain\Aggregates\User;

final class UserView
{
    public function normalize(User $user): array
    {
        return [
            'id' => $user->id()->toString(),
            'firstname' => $user->personal_identity()->name()->firstNameToString(),
            'lastname' => $user->personal_identity()->name()->lastNameToString(),
            'address' => [
                'street_number' => $user->personal_identity()->address()->streetNumber()->toString(),
                'street_name' => $user->personal_identity()->address()->street()->toString(),
                'city' => $user->personal_identity()->address()->city()->nameToString(),
                'postal_code' => $user->personal_identity()->address()->city()->postalCodeToString(),
            ],
        ];
    }
}
