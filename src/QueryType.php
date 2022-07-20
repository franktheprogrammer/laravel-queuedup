<?php

namespace FrankTheProgrammer\LaravelQueuedUp;

use Spatie\DataTransferObject\DataTransferObject;

class QueryType extends DataTransferObject
{
    public string $query;
    public array $bindings;
    public float $time;
}
