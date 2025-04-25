<?php

declare(strict_types=1);

namespace App\States\User;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class UserState extends State
{
    final public static function config(): StateConfig
    {
        return parent::config()
            ->default(Created::class);
    }
}
