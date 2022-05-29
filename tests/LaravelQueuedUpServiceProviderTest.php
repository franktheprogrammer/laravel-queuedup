<?php

use FrankTheProgrammer\LaravelQueuedUp\Listeners\JobRecorder;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobQueued;

it('can see that the listeners are registered', function () {
    $this->assertListenerIsAttachedToEvent(
        JobRecorder::class,
        JobQueued::class,
    );

    $this->assertListenerIsAttachedToEvent(
        JobRecorder::class,
        JobProcessing::class,
    );

    $this->assertListenerIsAttachedToEvent(
        JobRecorder::class,
        JobProcessed::class,
    );

    $this->assertListenerIsAttachedToEvent(
        JobRecorder::class,
        JobFailed::class,
    );
});
