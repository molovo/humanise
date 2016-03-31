<?php

use Molovo\Humanise\Humanise;

test('Test relative time with future date string < 2 minutes.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + 80);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in a minute');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string < 1 hour.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + 300);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 5 minutes');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string < 2 hours.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + 3620);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in an hour');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string < 1 day.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + 24000);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 6 hours');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string < 2 days.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + 86400);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in a day');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string < 1 week.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + (86400 * 6));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 6 days');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string < 2 weeks.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + (86400 * 8));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in a week');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string < 1 month.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + (86400 * 14));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 2 weeks');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string < 2 months.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + (86400 * 32));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in a month');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string < 1 year.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + (86400 * 30 * 3));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 3 months');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string < 2 years.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + (86400 * 370));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in a year');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future date string > 2 years.', function ($t) {
    $date = date('Y-m-d H:i:s', time() + (86400 * 760));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 2 years');
})->covers(Humanise::class, 'relativeTime');
