<?php

namespace Spatie\MailcoachPulse\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Spatie\MailcoachPulse\MailcoachPulse
 */
class MailcoachPulse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Spatie\MailcoachPulse\MailcoachPulse::class;
    }
}
