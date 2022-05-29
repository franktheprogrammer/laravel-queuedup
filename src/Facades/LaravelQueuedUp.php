<?php

namespace FrankTheProgrammer\LaravelQueuedUp\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FrankTheProgrammer\LaravelQueuedUp\LaravelQueuedUp
 */
class LaravelQueuedUp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-queuedup';
    }
}
