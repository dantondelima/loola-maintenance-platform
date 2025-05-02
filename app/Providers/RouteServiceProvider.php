<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->setRateLimiters();
    }

    public function setRateLimiters(): void
    {
        RateLimiter::for('api', function ($request) {
            return Limit::perMinute(config('app.throttle_limit.default'))
                ->by($request->user()?->id ?: $request->ip());
        });
    }
}
