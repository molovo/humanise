<?php

use Molovo\Humanise\Humanise;

function timeDataProvider()
{
    return [
        [60, 'a minute'],
        [300, '5 minutes'],
        [3600, 'an hour'],
        [18000, '5 hours'],
        [86400, 'a day'],
        [86400 * 5, '5 days'],
        [86400 * 8, 'a week'],
        [86400 * 14, '2 weeks'],
        [86400 * 32, 'a month'],
        [86400 * 30 * 3, '3 months'],
        [86400 * 365, 'a year'],
        [86400 * 365 * 3, '3 years'],
    ];
}

test('Test time with seconds only.', function ($t, $seconds, $expected) {
    $t->does(Humanise::time($seconds))->equal($expected);
})
    ->covers(Humanise::class, 'time')
    ->data(timeDataProvider());
