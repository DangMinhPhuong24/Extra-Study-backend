<?php

use Carbon\Carbon;
use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

if (!function_exists('collectionPaginate')) {
    /**
     * @param $results
     * @param int $pageSize
     * @param int|null $currentPage
     * @param array $otherOptions
     * @return Closure|LengthAwarePaginator|mixed|object|null
     */
    function collectionPaginate(
        $results,
        int $pageSize,
        int $currentPage = null,
        array $otherOptions = []
    ): mixed
    {
        $page = $currentPage ?? Paginator::resolveCurrentPage();
        $total = $results->count();
        $options = array_merge([
            'pageName' => 'page',
            'path' => config('app.url') . request()->getPathInfo(),
        ], $otherOptions);

        return Container::getInstance()->makeWith(LengthAwarePaginator::class, [
            'items' => $results->forPage($page, $pageSize),
            'total' => $total,
            'perPage' => $pageSize,
            'currentPage' => $currentPage,
            'options' => $options,
        ]);
    }
}

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
     * @param string $dateString
     * @return string|null
     */
    function format_date(string $dateString): ?string
    {
        try {
            $date = Carbon::parse($dateString);
            return $date->format('d/m/Y');
        } catch (\Exception $e) {
            return null;
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

