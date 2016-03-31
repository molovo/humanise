<?php

use Molovo\Humanise\Humanise;

test('Test relative time with past DateTime object < 1 minute.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('PT40S'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('just now');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 2 minutes.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('PT1M'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('a minute ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 1 hour.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('PT5M'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('5 minutes ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 2 hours.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('PT1H'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('an hour ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 1 day.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('PT6H'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('6 hours ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 2 days.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('P1D'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('a day ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 1 week.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('P5D'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('4 days ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 2 weeks.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('P8D'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('a week ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 1 month.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('P15D'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('2 weeks ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 2 months.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('P32D'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('a month ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 1 year.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('P3M'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('3 months ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object < 2 years.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('P12M'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('a year ago');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with past DateTime object > 2 years.', function ($t) {
    $date = (new DateTime)->sub(new DateInterval('P2Y'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('2 years ago');
})->covers(Humanise::class, 'relativeTime');
