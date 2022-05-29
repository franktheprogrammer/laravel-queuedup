<?php

namespace FrankTheProgrammer\LaravelQueuedUp;

use FrankTheProgrammer\LaravelQueuedUp\Listeners\JobRecorder;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobQueued;
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

    public function bootingPackage()
    {
        if (config('queuedup.enabled')) {
            $this->app['events']->listen(JobQueued::class, JobRecorder::class);
            $this->app['events']->listen(JobProcessing::class, JobRecorder::class);
            $this->app['events']->listen(JobProcessed::class, JobRecorder::class);
            $this->app['events']->listen(JobFailed::class, JobRecorder::class);
        }
    }
}
