<?php

declare(strict_types=1);

namespace App\States\User;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class UserState extends State
{
    /**
     * Returns the state configuration for user states with the default set to Created.
     *
     * @return StateConfig The configured state with Created as the default.
     */
    final public static function config(): StateConfig
    {
        return parent::config()
            ->default(Created::class);
    }
}
