<?php

namespace FrankTheProgrammer\LaravelQueuedUp\Tests;

use FrankTheProgrammer\LaravelQueuedUp\LaravelQueuedUpServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelQueuedUpServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        //
    }
}
