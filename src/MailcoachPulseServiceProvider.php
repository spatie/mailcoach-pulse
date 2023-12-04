<?php

namespace Spatie\MailcoachPulse;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\MailcoachPulse\Commands\MailcoachPulseCommand;

class MailcoachPulseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('mailcoach-pulse')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_mailcoach-pulse_table')
            ->hasCommand(MailcoachPulseCommand::class);
    }
}
