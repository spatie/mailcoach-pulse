<?php

namespace Spatie\MailcoachPulse\Commands;

use Illuminate\Console\Command;

class MailcoachPulseCommand extends Command
{
    public $signature = 'mailcoach-pulse';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
