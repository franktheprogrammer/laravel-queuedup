<?php

namespace FrankTheProgrammer\LaravelQueuedUp;

enum JobType
{
    case Queued;
    case Processing;
    case Processed;
    case Failed;
}
