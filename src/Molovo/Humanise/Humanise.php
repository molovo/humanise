<?php

namespace Molovo\Humanise;

use DateTimeInterface;

/**
 * Contains methods for humanisation of raw data.
 */
class Humanise
{
    /**
     * The number of bits to shift by for petabyte precision.
     *
     * @var int
     */
    const PB = 50;

    /**
     * The number of bits to shift by for terabyte precision.
     *
     * @var int
     */
    const TB = 40;

    /**
     * The number of bits to shift by for gigabyte precision.
     *
     * @var int
     */
    const GB = 30;

    /**
     * The number of bits to shift by for megabyte precision.
     *
     * @var int
     */
    const MB = 20;

    /**
     * The number of bits to shift by for kilobyte precision.
     *
     * @var int
     */
    const KB = 10;

    /**
     * An array of precisions and their labels.
     *
     * @const int[]
     */
    const PRECISION = [
        'PB' => self::PB,
        'TB' => self::TB,
        'GB' => self::GB,
        'MB' => self::MB,
        'KB' => self::KB,
    ];

    /**
     * Get the relative difference in time between two dates,
     * in human readable form.
     *
     * @param mixed      $date     The date or timestamp
     * @param mixed|null $baseline The date or timestamp to compare to,
     *                             (default is now)
     *
     * @return string
     */
    public static function relativeTime($date, $baseline = null)
    {
        $timestamp = self::getTimestamp($date);
        $diff      = self::getTimestamp($baseline ?: time()) - $timestamp;

        // Return 'now' if the two timestamps are the same
        if ($diff == 0) {
            return 'now';
        }

        if ($diff > 0 && $diff < 60) {
            return 'just now';
        }

        if ($diff > 0) {
            $diff = self::time(abs($diff));

            return "$diff ago";
        }

        if ($diff < 0) {
            $diff = self::time(abs($diff));

            return "in $diff";
        }
    }

    /**
     * Get the difference in time between two dates,
     * in human readable form.
     *
     * @param mixed      $date     The date or timestamp
     * @param mixed|null $baseline The date or timestamp to compare to,
     *                             (default is now)
     *
     * @return string
     */
    public static function diffTime($date, $baseline = null)
    {
        $timestamp = self::getTimestamp($date);
        $diff      = self::getTimestamp($baseline ?: time()) - $timestamp;

        // Return 'now' if the two timestamps are the same
        if ($diff == 0) {
            return 'now';
        }

        if ($diff > 0) {
            $diff = self::timeExact(abs($diff));

            return "$diff ago";
        }

        if ($diff < 0) {
            $diff = self::timeExact(abs($diff));

            return "in $diff";
        }
    }

    /**
     * Convert a number of seconds to a humanised time string.
     *
     * @param mixed $seconds The number of seconds
     *
     * @return string The humanised string
     */
    public static function time($seconds)
    {
        switch (true) {
            case $seconds < 120:
                return 'a minute';
                break;
            case $seconds < 3600:
                return floor($seconds / 60).' minutes';
                break;
            case $seconds < 7200:
                return 'an hour';
                break;
            case $seconds < 86400:
                return floor($seconds / 3600).' hours';
                break;
        }

        $days = floor($seconds / 86400);
        switch (true) {
            case $days == 0:
                break;
            case $days == 1:
                return 'a day';
                break;
            case $days < 7:
                return $days.' days';
                break;
            case $days < 14:
                return 'a week';
                break;
            case $days < 31:
                return floor($days / 7).' weeks';
                break;
            case $days < 60:
                return 'a month';
                break;
            case $days < 365:
                return floor($days / 30).' months';
                break;
            case $days < 730:
                return 'a year';
                break;
        }

        return floor($days / 365).' years';
    }

    /**
     * Convert a number of seconds to a breakdown of years, months, days etc.
     *
     * @param mixed $seconds The number of seconds
     *
     * @return string The humanised string
     */
    public static function timeExact($seconds)
    {
        extract(static::timeBreakdown($seconds));

        $out = [];

        if ($years > 0) {
            $out[] = $years.($years > 1 ? ' years' : ' year');
        }
        if ($months > 0) {
            $out[] = $months.($months > 1 ? ' months' : ' month');
        }
        if ($weeks > 0) {
            $out[] = $weeks.($weeks > 1 ? ' weeks' : ' week');
        }
        if ($days > 0) {
            $out[] = $days.($days > 1 ? ' days' : ' day');
        }
        if ($hours > 0) {
            $out[] = $hours.($hours > 1 ? ' hours' : ' hour');
        }
        if ($minutes > 0) {
            $out[] = $minutes.($minutes > 1 ? ' minutes' : ' minute');
        }
        if ($seconds > 0) {
            $out[] = $seconds.($seconds > 1 ? ' seconds' : ' second');
        }

        return static::listing($out);
    }

    /**
     * Convert a number of seconds to a shortened breakdown of
     * years, months, days etc.
     *
     * @param mixed $seconds The number of seconds
     *
     * @return string The humanised string
     */
    public static function timeExactShort($seconds)
    {
        extract(static::timeBreakdown($seconds));

        $out = [];

        $years > 0 && $out[]   = $years.'y';
        $months > 0 && $out[]  = $months.'m';
        $weeks > 0 && $out[]   = $weeks.'w';
        $days > 0 && $out[]    = $days.'d';
        $hours > 0 && $out[]   = $hours.'h';
        $minutes > 0 && $out[] = $minutes.'m';
        $seconds > 0 && $out[] = $seconds.'s';

        return implode(' ', $out);
    }

    /**
     * Convert a number of seconds into an array containing a breakdown
     * of years, months, days etc...
     *
     * @param int $seconds The number of seconds
     *
     * @return int[] The breakdown
     */
    public static function timeBreakdown($seconds)
    {
        return [
            'years'   => floor($seconds / 60 / 60 / 24 / 30 / 12),
            'months'  => ($seconds / 60 / 60 / 24 / 30 % 12),
            'weeks'   => ($seconds / 60 / 60 / 24 / 7 % 4),
            'days'    => ($seconds / 60 / 60 / 24 % 7),
            'hours'   => ($seconds / 60 / 60 % 24),
            'minutes' => ($seconds / 60 % 60),
            'seconds' => ($seconds % 60),
        ];
    }

    /**
     * Convert an array of items into a comma-separated list.
     *
     * @param array $items  The items in the list
     * @param bool  $oxford Whether to include an oxford comma after the 'and'
     *
     * @return string
     */
    public static function listing(array $items = [], $oxford = false)
    {
        if (count($items) === 0) {
            return;
        }

        if (count($items) === 1) {
            return $items[0];
        }

        $last = array_pop($items);
        $list = implode(', ', $items);

        if ((bool) $oxford) {
            $list .= ',';
        }

        return "$list and $last";
    }

    /**
     * Get the UNIX timestamp for a date string or DateTime object.
     *
     * @param string|int|DateTimeInterface $date The date or timestamp
     *
     * @return int The unix timestamp for the given date
     */
    public static function getTimestamp($date = null)
    {
        $timestamp = time();

        if (is_string($date)) {
            $timestamp = strtotime($date);

            if ($timestamp === false) {
                throw new InvalidDateException('The date '.$date.' is not valid');
            }
        }

        if ($date instanceof DateTimeInterface) {
            $timestamp = $date->getTimestamp();

            if ($timestamp === false) {
                throw new InvalidDateException('The date '.$date->format('Y-m-d H:i:s').' is not valid');
            }
        }

        if (is_int($date)) {
            $timestamp = $date;
        }

        return $timestamp;
    }

    /**
     * Get the humanised output of a file size in bytes.
     *
     * @param int      $bytes     The number of bytes to humanise
     * @param int      $decimals  The number of decimals to include in output
     * @param int|null $precision The precision of the output
     *
     * @return string The humanised size, including suffix
     */
    public static function size($bytes, $decimals = 2, $precision = null)
    {
        foreach (self::PRECISION as $key => $bits) {
            if (($precision === null && $bytes >= (1 << $bits)) || (int) $precision === $bits) {
                return number_format($bytes / (1 << $bits), $decimals).$key;
            }
        }

        return $bytes.' bytes';
    }
}
