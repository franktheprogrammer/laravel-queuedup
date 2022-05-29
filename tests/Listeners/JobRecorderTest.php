<?php

use FrankTheProgrammer\LaravelQueuedUp\Tests\TestClasses\FakeJob;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

it('can make http request when event processed', function () {
    Http::fake();

    dispatch(new FakeJob);

    $hostname = gethostname();

    Http::assertSent(function (Request $request) use ($hostname) {
        return $request->url() === strtolower('http://' . $hostname . ':4000/record-job');
    });
});
