<?php

use Molovo\Humanise\Humanise;

test('Test relative time with future DateTime object < 2 minutes.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('PT1M'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in a minute');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object < 1 hour.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('PT5M'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 5 minutes');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object < 2 hours.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('PT1H'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in an hour');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object < 1 day.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('PT6H'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 6 hours');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object < 2 days.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('P1D'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in a day');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object < 1 week.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('P5D'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 5 days');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object < 2 weeks.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('P8D'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in a week');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object < 1 month.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('P15D'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 2 weeks');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object < 2 months.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('P32D'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in a month');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object < 1 year.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('P3M'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 3 months');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object < 2 years.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('P12M'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in a year');
})->covers(Humanise::class, 'relativeTime');

test('Test relative time with future DateTime object > 2 years.', function ($t) {
    $date = (new DateTime)->add(new DateInterval('P2Y'));
    $diff = Humanise::relativeTime($date);
    $t->does($diff)->equal('in 2 years');
})->covers(Humanise::class, 'relativeTime');
