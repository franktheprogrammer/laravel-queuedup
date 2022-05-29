<?php

namespace FrankTheProgrammer\LaravelQueuedUp;

enum JobType: string
{
    case Queued = 'Queued';
    case Processing = 'Processing';
    case Processed = 'Processed';
    case Failed = 'Failed';
}
