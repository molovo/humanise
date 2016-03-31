<?php

use Molovo\Humanise\Humanise;

function timeExactDataProvider()
{
    return [
        [63, '1 minute and 3 seconds'],
        [305, '5 minutes and 5 seconds'],
        [3720, '1 hour and 2 minutes'],
        [18123, '5 hours, 2 minutes and 3 seconds'],
        [90123, '1 day, 1 hour, 2 minutes and 3 seconds'],
        [86409 * 5, '5 days and 45 seconds'],
        [86400 * 8, '1 week and 1 day'],
        [86400 * 14, '2 weeks'],
        [86400 * 32, '1 month and 4 days'],
        [86400 * 30 * 3, '3 months and 6 days'],
        [86400 * 365, '1 year and 1 day'],
        [86400 * 365 * 3, '3 years and 3 days'],
    ];
}

test('Test time exact.', function ($t, $seconds, $expected) {
    $t->does(Humanise::timeExact($seconds))->equal($expected);
})
    ->covers(Humanise::class, 'timeExact')
    ->data(timeExactDataProvider());
