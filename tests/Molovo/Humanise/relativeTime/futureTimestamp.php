<?php

use Molovo\Humanise\Humanise;

test('Test relative time with future timestamp < 2 minutes.', function ($t) {
    $diff = Humanise::relativeTime(time() + 80);
    $t->does($diff)->equal('in a minute');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp < 1 hour.', function ($t) {
    $diff = Humanise::relativeTime(time() + 300);
    $t->does($diff)->equal('in 5 minutes');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp < 2 hours.', function ($t) {
    $diff = Humanise::relativeTime(time() + 3620);
    $t->does($diff)->equal('in an hour');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp < 1 day.', function ($t) {
    $diff = Humanise::relativeTime(time() + 24000);
    $t->does($diff)->equal('in 6 hours');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp < 2 days.', function ($t) {
    $diff = Humanise::relativeTime(time() + 86400);
    $t->does($diff)->equal('in a day');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp < 1 week.', function ($t) {
    $diff = Humanise::relativeTime(time() + (86400 * 6));
    $t->does($diff)->equal('in 6 days');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp < 2 weeks.', function ($t) {
    $diff = Humanise::relativeTime(time() + (86400 * 8));
    $t->does($diff)->equal('in a week');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp < 1 month.', function ($t) {
    $diff = Humanise::relativeTime(time() + (86400 * 14));
    $t->does($diff)->equal('in 2 weeks');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp < 2 months.', function ($t) {
    $diff = Humanise::relativeTime(time() + (86400 * 32));
    $t->does($diff)->equal('in a month');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp < 1 year.', function ($t) {
    $diff = Humanise::relativeTime(time() + (86400 * 30 * 3));
    $t->does($diff)->equal('in 3 months');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp < 2 years.', function ($t) {
    $diff = Humanise::relativeTime(time() + (86400 * 370));
    $t->does($diff)->equal('in a year');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future timestamp > 2 years.', function ($t) {
    $diff = Humanise::relativeTime(time() + (86400 * 365 * 6));
    $t->does($diff)->equal('in 6 years');
})->covers(Humanise::class, 'relativeTime');
