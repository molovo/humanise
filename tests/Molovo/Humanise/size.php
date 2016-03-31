<?php

use Molovo\Humanise\Humanise;

test('Test byte amounts are converted correctly with no precision.', function ($t) {
    $bytes = 128;
    $t->does(Humanise::size($bytes))->equal('128 bytes');

    $bytes = 1024;
    $t->does(Humanise::size($bytes))->equal('1.00KB');

    $bytes = 1048576;
    $t->does(Humanise::size($bytes))->equal('1.00MB');

    $bytes = 1073741824;
    $t->does(Humanise::size($bytes))->equal('1.00GB');

    $bytes = 1099511627776;
    $t->does(Humanise::size($bytes))->equal('1.00TB');

    $bytes = 1125899906842624;
    $t->does(Humanise::size($bytes))->equal('1.00PB');
})->covers(Humanise::class, 'size');

test('Test byte amounts are converted correctly with KB precision.', function ($t) {
    $bytes = 128;
    $t->does(Humanise::size($bytes, 2, Humanise::KB))->equal('0.13KB');

    $bytes = 1024;
    $t->does(Humanise::size($bytes, 2, Humanise::KB))->equal('1.00KB');

    $bytes = 1048576;
    $t->does(Humanise::size($bytes, 2, Humanise::KB))->equal('1,024.00KB');

    $bytes = 1073741824;
    $t->does(Humanise::size($bytes, 2, Humanise::KB))->equal('1,048,576.00KB');

    $bytes = 1099511627776;
    $t->does(Humanise::size($bytes, 2, Humanise::KB))->equal('1,073,741,824.00KB');

    $bytes = 1125899906842624;
    $t->does(Humanise::size($bytes, 2, Humanise::KB))->equal('1,099,511,627,776.00KB');
})->covers(Humanise::class, 'size');

test('Test byte amounts are converted correctly with MB precision.', function ($t) {
    $bytes = 128;
    $t->does(Humanise::size($bytes, 2, Humanise::MB))->equal('0.00MB');

    $bytes = 1024;
    $t->does(Humanise::size($bytes, 2, Humanise::MB))->equal('0.00MB');

    $bytes = 1048576;
    $t->does(Humanise::size($bytes, 2, Humanise::MB))->equal('1.00MB');

    $bytes = 1073741824;
    $t->does(Humanise::size($bytes, 2, Humanise::MB))->equal('1,024.00MB');

    $bytes = 1099511627776;
    $t->does(Humanise::size($bytes, 2, Humanise::MB))->equal('1,048,576.00MB');

    $bytes = 1125899906842624;
    $t->does(Humanise::size($bytes, 2, Humanise::MB))->equal('1,073,741,824.00MB');
})->covers(Humanise::class, 'size');

test('Test byte amounts are converted correctly with GB precision.', function ($t) {
    $bytes = 128;
    $t->does(Humanise::size($bytes, 2, Humanise::GB))->equal('0.00GB');

    $bytes = 1024;
    $t->does(Humanise::size($bytes, 2, Humanise::GB))->equal('0.00GB');

    $bytes = 1048576;
    $t->does(Humanise::size($bytes, 2, Humanise::GB))->equal('0.00GB');

    $bytes = 1073741824;
    $t->does(Humanise::size($bytes, 2, Humanise::GB))->equal('1.00GB');

    $bytes = 1099511627776;
    $t->does(Humanise::size($bytes, 2, Humanise::GB))->equal('1,024.00GB');

    $bytes = 1125899906842624;
    $t->does(Humanise::size($bytes, 2, Humanise::GB))->equal('1,048,576.00GB');
})->covers(Humanise::class, 'size');

test('Test byte amounts are converted correctly with TB precision.', function ($t) {
    $bytes = 128;
    $t->does(Humanise::size($bytes, 2, Humanise::TB))->equal('0.00TB');

    $bytes = 1024;
    $t->does(Humanise::size($bytes, 2, Humanise::TB))->equal('0.00TB');

    $bytes = 1048576;
    $t->does(Humanise::size($bytes, 2, Humanise::TB))->equal('0.00TB');

    $bytes = 1073741824;
    $t->does(Humanise::size($bytes, 2, Humanise::TB))->equal('0.00TB');

    $bytes = 1099511627776;
    $t->does(Humanise::size($bytes, 2, Humanise::TB))->equal('1.00TB');

    $bytes = 1125899906842624;
    $t->does(Humanise::size($bytes, 2, Humanise::TB))->equal('1,024.00TB');
})->covers(Humanise::class, 'size');

test('Test byte amounts are converted correctly with PB precision.', function ($t) {
    $bytes = 128;
    $t->does(Humanise::size($bytes, 2, Humanise::PB))->equal('0.00PB');

    $bytes = 1024;
    $t->does(Humanise::size($bytes, 2, Humanise::PB))->equal('0.00PB');

    $bytes = 1048576;
    $t->does(Humanise::size($bytes, 2, Humanise::PB))->equal('0.00PB');

    $bytes = 1073741824;
    $t->does(Humanise::size($bytes, 2, Humanise::PB))->equal('0.00PB');

    $bytes = 1099511627776;
    $t->does(Humanise::size($bytes, 2, Humanise::PB))->equal('0.00PB');

    $bytes = 1125899906842624;
    $t->does(Humanise::size($bytes, 2, Humanise::PB))->equal('1.00PB');
})->covers(Humanise::class, 'size');
