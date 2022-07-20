<?php

namespace FrankTheProgrammer\LaravelQueuedUp;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class QueryEntry extends DataTransferObject
{
    public int|string $job_id;
    public string $project_path;

    #[CastWith(ArrayCaster::class, itemType: QueryType::class)]
    public array $queries;
}
