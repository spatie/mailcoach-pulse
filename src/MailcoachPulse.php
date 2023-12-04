<?php

namespace Spatie\MailcoachPulse;

class MailcoachPulse
{
    public static function isConfigured(): bool
    {
        if (! config('services.mailcoach.pulse.api_key')) {
            return false;
        }

        if (! config('services.mailcoach.pulse.api_endpoint')) {
            return false;
        }

        return true;
    }
}
