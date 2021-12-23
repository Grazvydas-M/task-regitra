<?php

namespace App\Services;

use App\Models\User;


class UserService
{
    public function getUserWithLeastCustomers(): User
    {
        /** @var User $user */
        $user = User::query()
            ->select('users.*')
            ->leftJoin('visits', 'users.id', '=', 'visits.user_id')
            ->groupBy(
                [
                    'users.id',
                    'users.name', 'users.email',
                    'users.password',
                    'users.remember_token',
                    'users.created_at',
                    'users.updated_at',
                ]
            )
            ->orderByRaw('sum(case when visits.status = "NOT_STARTED" then visits.time else 0 end)')
            ->first();

        return $user;
    }
}
