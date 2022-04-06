<?php

namespace App\Constants;

class UserRoles
{
    const CREATE_USER = 'CREATE_USER';
    const DELETE_USER = 'DELETE_USER';
    const CHANGE_USER_PASSWORD = 'CHANGE_USER_PASSWORD';

    public function getAll(): array
    {
        $reflectionClass = new \ReflectionClass(static::class);

        return array_values(
            $reflectionClass->getConstants()
        );
    }
}
