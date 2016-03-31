<?php

use Molovo\Humanise\Humanise;

test('Test relative time with past date string < 1 minute.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - 40);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('just now');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 2 minutes.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - 80);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('a minute ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 1 hour.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - 300);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('5 minutes ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 2 hours.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - 3620);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('an hour ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 1 day.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - 24000);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('6 hours ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 2 days.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - 86400);
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('a day ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 1 week.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - (86400 * 6));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('6 days ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 2 weeks.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - (86400 * 8));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('a week ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 1 month.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - (86400 * 14));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('2 weeks ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 2 months.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - (86400 * 32));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('a month ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 1 year.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - (86400 * 30 * 3));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('3 months ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string < 2 years.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - (86400 * 370));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('a year ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past date string > 2 years.', function ($t) {
    $date = date('Y-m-d H:i:s', time() - (86400 * 760));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('2 years ago');
})->covers(Humanise::class, 'relativeTime');
