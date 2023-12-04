<?php

namespace Spatie\MailcoachPulse;

use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\MailcoachPulse\Livewire\MailcoachListPulseCardComponent;
use Spatie\MailcoachSdk\Mailcoach;

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

        Livewire::component('mailcoach.pulse', MailcoachListPulseCardComponent::class);

        $this->app->bind('mailcoach-pulse', function() {
            if (! MailcoachPulse::isConfigured()) {
                return null;
            }

            return new Mailcoach(
                config('services.mailcoach.pulse.api_key'),
                config('services.mailcoach.pulse.api_endpoint'),
            );
        });
    }
}
