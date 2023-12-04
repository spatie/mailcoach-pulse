<?php

namespace Spatie\MailcoachPulse;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\MailcoachPulse\Livewire\MailcoachPulseCardComponent;

class MailcoachPulseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('mailcoach-pulse')
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageBooted()
    {
        parent::packageBooted();

        Livewire::component('mailcoach.pulse', MailcoachPulseCardComponent::class);
    }
}
