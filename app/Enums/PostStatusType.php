<?php

namespace App\Enums;

enum PostStatusType: string
{
    case ACTIVE = 'Active';
    case INACTIVE = 'Inactive';

    public static function getLabel(): array
    {
        return [
            self::ACTIVE->value => 'Active',
            self::INACTIVE->value => 'Inactive',
        ];
    }
}
