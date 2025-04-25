<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRoleEnum: string
{
    case ADMIN = 'admin';
    case CONTRACTOR = 'contractor';
    case PROPERTY_MANAGER = 'property_manager';
}
