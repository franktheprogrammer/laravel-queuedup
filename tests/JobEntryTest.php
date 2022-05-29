<?php

use FrankTheProgrammer\LaravelQueuedUp\JobEntry;
use FrankTheProgrammer\LaravelQueuedUp\JobType;

it('can setup job entry and defaults', function () {
    $entry = new JobEntry([
        'id' => 1,
        'connection' => 'test-connection',
        'queue' => 'test-queue',
        'type' => JobType::Queued,
        'name' => 'Test Entry',
        'size' => '2M',
    ]);

    expect($entry->attempts)->toBe(0);
    expect($entry->uuid)->toBeNull();
    expect($entry->payload)->toBeNull();
});
