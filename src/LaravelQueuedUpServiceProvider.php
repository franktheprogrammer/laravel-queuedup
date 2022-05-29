<?php

namespace FrankTheProgrammer\LaravelQueuedUp;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelQueuedUpServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-queuedup')
            ->hasConfigFile();
    }
}
