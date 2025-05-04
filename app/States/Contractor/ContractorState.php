<?php

declare(strict_types=1);

namespace App\States\Contractor;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class ContractorState extends State
{
    final public static function config(): StateConfig
    {
        return parent::config()
            ->default(Created::class);
    }
}
