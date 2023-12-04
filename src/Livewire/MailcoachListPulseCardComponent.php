<?php

namespace Spatie\MailcoachPulse\Livewire;

use Carbon\CarbonInterval;
use Laravel\Pulse\Livewire\Card;
use Livewire\Attributes\Lazy;
use Spatie\MailcoachPulse\Livewire\Traits\RemembersApiCalls;
use Spatie\MailcoachPulse\Livewire\Traits\UsesMailcoach;
use Spatie\MailcoachSdk\Resources\EmailList;

#[Lazy]
class MailcoachListPulseCardComponent extends Card
{
    use UsesMailcoach;
    use RemembersApiCalls;

    public string $emailListUuid;

    public function mount(string $emailListUuid = null)
    {
        $this->emailListUuid = $emailListUuid ?? config('services.mailcoach.pulse.email_list_uuid');
    }

    public function render()
    {
        return view('mailcoach-pulse::list', [
            'emailList' => ray()->pass($this->emailList()),
        ]);
    }

    protected function emailList(): ?EmailList
    {
        if (! $mailcoach = $this->mailcoach()) {
            return null;
        }

        $emailListProperties = $this->remember(
            fn() => $mailcoach->emailList($this->emailListUuid)->toArray(),
            "emailList:{$this->emailListUuid}",
            CarbonInterval::minute(),
        );

        return new EmailList($emailListProperties);
    }
}
