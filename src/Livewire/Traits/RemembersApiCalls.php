<?php

namespace Spatie\MailcoachPulse\Livewire\Traits;

use Carbon\CarbonInterval;
use Illuminate\Support\Facades\App;
use Laravel\Pulse\Support\CacheStoreResolver;

trait RemembersApiCalls
{
    public function remember(callable $apiCall, string $key = '', CarbonInterval $interval = null): mixed
    {
        $interval ??= CarbonInterval::seconds(5);

        return App::make(CacheStoreResolver::class)->store()->remember(
            'laravel:pulse:' . static::class . ':' . $key,
            $interval,
            fn() => $apiCall(),
        );
    }
}
