<?php

use Carbon\Carbon;

if (!function_exists('decimal_to_double')) {
    /**
     * @param $number
     * @return Closure|mixed|object|null
     */
    function decimal_to_double(
        $number
    ): mixed
    {
        return !empty($number) ?
            round((float) $number, 2) :
            config('constants.add.zero');
    }
}

if (!function_exists('convert_date_to_created_at')) {
    /**
     * @param string $dateString
     * @return Carbon
     */
    function convert_date_to_created_at(string $dateString): Carbon
    {
        try {
            return Carbon::createFromFormat('H:i d/m/Y', $dateString);
        } catch (\Exception $e) {
            return now();
        }
    }
}

if (!function_exists('format_save_date')) {
    /**
     * @param string $dateString
     * @return Carbon
     */
    function format_save_date(string $dateString): Carbon
    {
        try {
            return Carbon::createFromFormat('Y-m-d', $dateString);
        } catch (\Exception $e) {
            return now();
        }
    }
}

if (!function_exists('format_date')) {
    /**
     * @param $dateString
     */
    function format_date($dateString)
    {
        if($dateString) {
            return Carbon::parse($dateString)->format('d/m/Y');
        }
    }
}

if (!function_exists('format_date_time')) {
    /**
     * @param string $dateString
     * @return string|null
     */
    function format_date_time(string $dateString): ?string
    {
        try {
            $date = Carbon::parse($dateString);
            return $date->format('H:i d/m/Y');
        } catch (\Exception $e) {
            return null;
        }
    }
}

if (!function_exists('format_start_date')) {
    /**
     * @param string $dateString
     * @return string|null
     */
    function format_start_date(string $dateString): ?string
    {
        try {
            return Carbon::parse($dateString)->startOfDay();
        } catch (\Exception $e) {
            return null;
        }
    }
}

if (!function_exists('format_end_date')) {
    /**
     * @param string $dateString
     * @return string|null
     */
    function format_end_date(string $dateString): ?string
    {
        try {
            return Carbon::parse($dateString)->endOfDay();
        } catch (\Exception $e) {
            return null;
        }
    }
}

