<?php

namespace FrankTheProgrammer\LaravelQueuedUp;

use Spatie\DataTransferObject\DataTransferObject;

class JobEntry extends DataTransferObject
{
    public int $id;
    public string $connection;
    public string $queue;
    public JobType $type;
    public int $attempts = 0;

    public string $name;
    public ?string $size;
    public ?string $uuid;
    public ?string $payload;
}
