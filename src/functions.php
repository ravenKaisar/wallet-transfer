<?php

if (!function_exists('getWeekNumberWithYear')) {
    /**
     * @throws Exception
     */
    function getWeekNumberWithYear($date): int
    {
        $date = new DateTime($date);
        return $date->format("oW");
    }
}

if (!function_exists('nearestRounded')) {
    /**
     * @throws Exception
     */
    function nearestRounded($value): float
    {
        return round($value * 2, 1) / 2;
    }
}
