<?php

namespace FrankTheProgrammer\LaravelQueuedUp\Tests;

use FrankTheProgrammer\LaravelQueuedUp\LaravelQueuedUpServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use ReflectionFunction;

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
        config()->set('queuedup.enabled', true);
    }

    public function assertListenerIsAttachedToEvent($listener, $event)
    {
        foreach ($this->app['events']->getListeners(is_object($event) ? get_class($event) : $event) as $listenerClosure) {
            $reflection = new ReflectionFunction($listenerClosure);
            $listenerClass = $reflection->getStaticVariables()['listener'];

            if ($listenerClass === $listener) {
                $this->assertTrue(true);

                return;
            }
        }

        $this->assertTrue(false, sprintf('Event %s does not have the %s listener attached to it', $event, $listener));
    }
}
