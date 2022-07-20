<?php

namespace FrankTheProgrammer\LaravelQueuedUp;

use FrankTheProgrammer\LaravelQueuedUp\Listeners\CommandRecorder;
use FrankTheProgrammer\LaravelQueuedUp\Listeners\JobRecorder;
use FrankTheProgrammer\LaravelQueuedUp\Listeners\QueryRecorder;
use Illuminate\Console\Events\CommandFinished;
use Illuminate\Console\Events\CommandStarting;
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
            $this->app['events']->listen(CommandStarting::class, CommandRecorder::class);
            $this->app['events']->listen(CommandFinished::class, CommandRecorder::class);

            $this->app['events']->listen(JobQueued::class, JobRecorder::class);
            $this->app['events']->listen(JobProcessing::class, JobRecorder::class);
            $this->app['events']->listen(JobProcessed::class, JobRecorder::class);
            $this->app['events']->listen(JobFailed::class, JobRecorder::class);

            $this->app['events']->listen(JobProcessed::class, QueryRecorder::class);
            $this->app['events']->listen(JobFailed::class, QueryRecorder::class);
        }
    }
}
