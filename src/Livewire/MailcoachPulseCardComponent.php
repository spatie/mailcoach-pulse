<?php

namespace Spatie\MailcoachPulse\Livewire;

use Laravel\Pulse\Livewire\Card;

class MailcoachPulseCardComponent extends Card
{
    public function render()
    {
        return view('mailcoach-pulse::card');
    }
}
