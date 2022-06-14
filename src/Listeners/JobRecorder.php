<?php

namespace FrankTheProgrammer\LaravelQueuedUp\Listeners;

use FrankTheProgrammer\LaravelQueuedUp\JobEntry;
use FrankTheProgrammer\LaravelQueuedUp\JobType;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobQueued;
use Illuminate\Support\Facades\Http;

class JobRecorder
{
    public function handle($event)
    {
        $entry = null;

        if ($event instanceof JobQueued) {
            $entry = new JobEntry([
                'id' => $event->id,
                'connection' => $event->connectionName,
                /** @phpstan-ignore-next-line */
                'queue' => $event->job->queue,
                'name' => get_class($event->job),
                'type' => JobType::Queued,
            ]);
        }

        if ($event instanceof JobProcessing) {
            $entry = new JobEntry([
                'id' => $event->job->getJobId(),
                'connection' => $event->connectionName,
                'queue' => $event->job->getQueue(),
                'uuid' => $event->job->uuid(),
                'name' => $event->job->payload()['displayName'],
                'attempts' => $event->job->attempts(),
                'type' => JobType::Processing,
            ]);
        }

        if ($event instanceof JobProcessed) {
            $entry = new JobEntry([
                'id' => $event->job->getJobId(),
                'connection' => $event->connectionName,
                'queue' => $event->job->getQueue(),
                'uuid' => $event->job->uuid(),
                'name' => $event->job->payload()['displayName'],
                'attempts' => $event->job->attempts(),
                'type' => JobType::Processed,
            ]);
        }

        if ($event instanceof JobFailed) {
            $entry = new JobEntry([
                'id' => $event->job->getJobId(),
                'connection' => $event->connectionName,
                'queue' => $event->job->getQueue(),
                'uuid' => $event->job->uuid(),
                'name' => $event->job->payload()['displayName'],
                'attempts' => $event->job->attempts(),
                'type' => JobType::Failed,
            ]);
        }

        if ($entry instanceof JobEntry) {
            $hostname = gethostname();

            $entry->project_path = base_path();

            Http::post(
                'http://' . $hostname . ':4000/record-job',
                $entry->toArray()
            );
        }
    }
}
