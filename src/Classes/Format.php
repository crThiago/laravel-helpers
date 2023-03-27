<?php

namespace Crthiago\LaravelHelpers\Classes;

class Format
{

    /** method to format money
     *
     * @param string|float $number
     * @param string|bool $prefix
     * @param int $decimals
     * @param string $decimalSeparator
     * @param string $thousandSeparator
     *
     * @return string
     */
    public static function money(
        string|float $number,
        string|bool $prefix = 'R$ ',
        int $decimals = 2,
        string $decimalSeparator = ',',
        string $thousandSeparator = '.'
    ): string {
        $number = number_format($number, $decimals, $decimalSeparator, $thousandSeparator);
        if ($prefix) {
            $number = $prefix . $number;
        }
        return $number;
    }

    /** method to format number to database
     *
     * @param string $number
     * @param string $thousandSeparator
     *
     * @return float
     */
    public static function numberDb(string $number, string $thousandSeparator = '.'): float
    {
        $number = preg_replace('/^[^0-9.,-]+/', '', $number);
        if ($thousandSeparator === ',') {
            return (float) str_replace(',', '', $number);
        }
        return (float) str_replace(',', '.', str_replace('.', '', $number));
    }

    /** method to format date
     *
     * @param string $date
     * @param string $format
     *
     * @return string
     */
    public static function date(string $date, string|null $format = null): string
    {
        return date($format ?? self::dateFormatDefault(), strtotime($date));
    }

    /** method to format datetime
     *
     * @param string $date
     * @param string $format
     *
     * @return string
     */
    public static function datetime(string $date, string|null $format = null): string
    {
        return date($format ?? self::datetimeFormatDefault(), strtotime($date));
    }

    /** method to format date to database
     *
     * @param string $date_string
     * @param string $format
     *
     * @return string
     */
    public static function dateDb(string $date_string, string|null $format = null): string
    {
        $date = \DateTime::createFromFormat($format ?? self::dateFormatDefault(), $date_string);
        return $date->format('Y-m-d');
    }

    /** method to format datetime to database
     *
     * @param string $date_string
     * @param string $format
     *
     * @return string
     */
    public static function datetimeDb(string $date_string, string|null $format = null): string
    {
        $date = \DateTime::createFromFormat($format ?? self::datetimeFormatDefault(), $date_string);
        return $date->format('Y-m-d H:i:s');
    }

    private static function dateFormatDefault(): string
    {
        return config('php-helpers.date_format');
    }

    private static function datetimeFormatDefault(): string
    {
        return config('php-helpers.datetime_format');
    }
}