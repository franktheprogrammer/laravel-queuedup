<?php

namespace FrankTheProgrammer\LaravelQueuedUp\Listeners;

use FrankTheProgrammer\LaravelQueuedUp\QueryEntry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class QueryRecorder
{
    public function handle($event)
    {
        $queries = DB::getQueryLog();

        $hostname = gethostname();

        $entry = new QueryEntry([
            'job_id' => $event->job->getJobId(),
            'queries' => $queries,
            'project_path' => base_path(),
        ]);

        Http::post(
            'http://' . $hostname . ':4000/record-queries',
            $entry->toArray()
        );
    }
}
