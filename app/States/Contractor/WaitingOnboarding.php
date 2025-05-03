<?php

declare(strict_types=1);

namespace App\States\Contractor;

use App\States\Contractor\ContractorState;

final class WaitingOnboarding extends ContractorState
{
    public static string $name = 'waiting_onboarding';
}
