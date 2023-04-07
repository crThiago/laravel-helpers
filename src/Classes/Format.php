<?php

declare(strict_types=1);

namespace Crthiago\LaravelHelpers\Classes;

final class Format
{
    /** method to format money
     *
     * @param string|float $number Number to format
     * @param string|bool $prefix [optional] Prefix to add before number (default: R$ )
     * @param int $decimals [optional] Number of decimals (default: 2)
     * @param string $decimalSeparator [optional] Decimal separator (default: ,)
     * @param string $thousandSeparator [optional] Thousand separator (default: .)
     *
     * @return string Formatted number
     */
    public static function money(
        string|float $number,
        string|bool $prefix = 'R$ ',
        int $decimals = 2,
        string $decimalSeparator = ',',
        string $thousandSeparator = '.'
    ): string {
        $number = number_format((float) $number, $decimals, $decimalSeparator, $thousandSeparator);
        if ($prefix) {
            $number = $prefix . $number;
        }
        return $number;
    }

    /** method to format number to database
     *
     * @param string $number Number to format
     * @param string $thousandSeparator [optional] Thousand separator (default: .)
     *
     * @return float Formatted number
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
     * @param string $date Date to format
     * @param string|null $format [optional] Format to use (default: d/m/Y)
     *
     * @return string Formatted date
     */
    public static function date(string $date, string|null $format = null): string
    {
        return date($format ?? self::dateFormatDefault(), strtotime($date));
    }

    /** method to format datetime
     *
     * @param string $date Date to format
     * @param string|null $format [optional] Format to use (default: d/m/Y H:i:s)
     *
     * @return string Formatted date
     */
    public static function datetime(string $date, string|null $format = null): string
    {
        return date($format ?? self::datetimeFormatDefault(), strtotime($date));
    }

    /** method to format date to database
     *
     * @param string $date_string Date to format
     * @param string|null $format [optional] Format to use (default: d/m/Y)
     *
     * @return string Formatted date
     */
    public static function dateDb(string $date_string, string|null $format = null): string
    {
        $date = \DateTime::createFromFormat($format ?? self::dateFormatDefault(), $date_string);
        return $date->format('Y-m-d');
    }

    /** method to format datetime to database
     *
     * @param string $date_string Date to format
     * @param string|null $format [optional] Format to use (default: d/m/Y H:i:s)
     *
     * @return string Formatted date
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
