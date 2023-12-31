<?php

namespace Spatie\MailcoachPulse\Livewire\Traits;

use Spatie\MailcoachPulse\MailcoachPulse;
use Spatie\MailcoachSdk\Mailcoach;

trait UsesMailcoach
{
    public function mailcoach(): ?Mailcoach
    {
        if (! MailcoachPulse::isConfigured()) {
            return null;
        }

        return app('mailcoach-pulse');
    }
}
