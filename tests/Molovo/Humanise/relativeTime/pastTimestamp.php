<?php

use Molovo\Humanise\Humanise;

test('Test relative time with past timestamp < 1 minute.', function ($t) {
    $diff = Humanise::relativeTime(time() - 40);
    $t->does($diff)->equal('just now');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 2 minutes.', function ($t) {
    $diff = Humanise::relativeTime(time() - 80);
    $t->does($diff)->equal('a minute ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 1 hour.', function ($t) {
    $diff = Humanise::relativeTime(time() - 300);
    $t->does($diff)->equal('5 minutes ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 2 hours.', function ($t) {
    $diff = Humanise::relativeTime(time() - 3620);
    $t->does($diff)->equal('an hour ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 1 day.', function ($t) {
    $diff = Humanise::relativeTime(time() - 24000);
    $t->does($diff)->equal('6 hours ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 2 days.', function ($t) {
    $diff = Humanise::relativeTime(time() - 86400);
    $t->does($diff)->equal('a day ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 1 week.', function ($t) {
    $diff = Humanise::relativeTime(time() - (86400 * 6));
    $t->does($diff)->equal('6 days ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 2 weeks.', function ($t) {
    $diff = Humanise::relativeTime(time() - (86400 * 8));
    $t->does($diff)->equal('a week ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 1 month.', function ($t) {
    $diff = Humanise::relativeTime(time() - (86400 * 14));
    $t->does($diff)->equal('2 weeks ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 2 months.', function ($t) {
    $diff = Humanise::relativeTime(time() - (86400 * 32));
    $t->does($diff)->equal('a month ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 1 year.', function ($t) {
    $diff = Humanise::relativeTime(time() - (86400 * 30 * 3));
    $t->does($diff)->equal('3 months ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp < 2 years.', function ($t) {
    $diff = Humanise::relativeTime(time() - (86400 * 370));
    $t->does($diff)->equal('a year ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past timestamp > 2 years.', function ($t) {
    $diff = Humanise::relativeTime(time() - (86400 * 365 * 6));
    $t->does($diff)->equal('6 years ago');
})->covers(Humanise::class, 'relativeTime');
