<?php

namespace App\Queries;

use App\Models\User;

final class UserQueries
{
    /**
     * Find user with given token.
     */
    public static function findWithToken(string $api_token): ?User {
        return User::where('api_token', $api_token)->first();
    }
}
