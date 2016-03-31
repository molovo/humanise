<?php

use Molovo\Humanise\Humanise;

test('Test relative time with two matching timestamps.', function ($t) {
    $diff = Humanise::relativeTime(time(), time());
    $t->does($diff)->equal('now');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with two matching date strings.', function ($t) {
    $diff = Humanise::relativeTime(date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
    $t->does($diff)->equal('now');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with two matching DateTime objects.', function ($t) {
    $diff = Humanise::relativeTime(new DateTime, new DateTime);
    $t->does($diff)->equal('now');
})->covers(Humanise::class, 'relativeTime');
