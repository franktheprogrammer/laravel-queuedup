<?php

namespace FrankTheProgrammer\LaravelQueuedUp\Listeners;

use Illuminate\Console\Events\CommandFinished;
use Illuminate\Console\Events\CommandStarting;
use Illuminate\Support\Facades\DB;

class CommandRecorder
{
    public function handle($event)
    {
        if ($event instanceof CommandStarting) {
            DB::enableQueryLog();
        }

        if ($event instanceof CommandFinished) {
            DB::disableQueryLog();
        }
    }
}
