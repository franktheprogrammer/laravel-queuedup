<?php

namespace FrankTheProgrammer\LaravelQueuedUp\Tests\TestClasses;

use Illuminate\Contracts\Queue\ShouldQueue;

class FakeJob implements ShouldQueue
{
    public function handle()
    {
    }
}
