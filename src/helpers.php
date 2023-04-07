<?php

declare(strict_types=1);

use Crthiago\LaravelHelpers\Classes\Format;
use Crthiago\LaravelHelpers\Classes\Mask;
use Crthiago\LaravelHelpers\Classes\Sanitize;
use Crthiago\LaravelHelpers\Classes\Validate;

if (! function_exists('validate_cpf')) {
    /**
     * Validate CPF
     *
     * @param  string|int  $cpf Number to validate
     *
     * @return bool True if valid, false otherwise
     */
    function validate_cpf(string|int $cpf): bool
    {
        return Validate::cpf($cpf);
    }
}

if (! function_exists('validate_cnpj')) {
    /**
     * Validate CNPJ
     *
     * @param  string|int  $cnpj Number to validate
     *
     * @return bool True if valid, false otherwise
     */
    function validate_cnpj(string|int $cnpj): bool
    {
        return Validate::cnpj($cnpj);
    }
}

if (! function_exists('money')) {
    /**
     * Format money
     *
     * @param string|float $number Number to format
     * @param string|bool $prefix [optional] Prefix to add before number (default: R$ )
     * @param int $decimals [optional] Number of decimals (default: 2)
     * @param string $decimalSeparator [optional] Decimal separator (default: ,)
     * @param string $thousandSeparator [optional] Thousand separator (default: .)
     *
     * @return string Formatted number
     */
    function money(
        float|string $number,
        string|bool $prefix = 'R$ ',
        int $decimals = 2,
        string $decimalSeparator = ',',
        string $thousandSeparator = '.'
    ): string {
        return Format::money($number, $prefix, $decimals, $decimalSeparator, $thousandSeparator);
    }
}

if (! function_exists('number_db')) {
    /**
     * Format number to database
     *
     * @param string $number Number to format
     * @param string $thousandSeparator [optional] Thousand separator (default: .)
     *
     * @return float Formatted number
     */
    function number_db(string $number, string $thousandSeparator = '.'): float
    {
        return Format::numberDb($number, $thousandSeparator);
    }
}

if (! function_exists('format_date')) {
    /**
     * Format date
     *
     * @param string $date Date to format
     * @param string|null $format [optional] Format to use (default: d/m/Y)
     *
     * @return string Formatted date
     */
    function format_date(string $date, string|null $format = null): string
    {
        return Format::date($date, $format);
    }
}

if (! function_exists('datetime')) {
    /**
     * Format datetime
     *
     * @param string $date Date to format
     * @param string|null $format [optional] Format to use (default: d/m/Y H:i:s)
     *
     * @return string Formatted date
     */
    function datetime(string $date, string|null $format = null): string
    {
        return Format::datetime($date, $format);
    }
}

if (! function_exists('date_db')) {
    /**
     * Format date to database
     *
     * @param string $date Date to format
     * @param string|null $format [optional] Format to use (default: d/m/Y)
     *
     * @return string Formatted date
     */
    function date_db(string $date, string|null $format = null): string
    {
        return Format::dateDb($date, $format);
    }
}

if (! function_exists('datetime_db')) {
    /**
     * Format datetime to database
     *
     * @param string $date Date to format
     * @param string|null $format [optional] Format to use (default: d/m/Y H:i:s)
     *
     * @return string Formatted date
     */
    function datetime_db(string $date, string|null $format = null): string
    {
        return Format::datetimeDb($date, $format);
    }
}

if (! function_exists('remove_accents')) {
    /**
     * Remove accents
     *
     * @param string $string String to remove accents
     *
     * @return string String without accents
     */
    function remove_accents(string $string): string
    {
        return Sanitize::removeAccents($string);
    }
}

if (! function_exists('remove_special_characters')) {
    /**
     * Remove special characters
     *
     * @param string $string String to remove special characters
     *
     * @return string String without special characters
     */
    function remove_special_characters(string $string): string
    {
        return Sanitize::removeSpecialCharacters($string);
    }
}

if (! function_exists('mask_cpf')) {
    /**
     * Mask CPF
     *
     * @param  string|int  $cpf Value to mask
     *
     * @return string CPF masked
     *
     * @throws \Exception Invalid length
     */
    function mask_cpf(string|int $cpf): string
    {
        return Mask::cpf($cpf);
    }
}

if (! function_exists('mask_cnpj')) {
    /**
     * Mask CNPJ
     *
     * @param  string|int  $cnpj Value to mask
     *
     * @return string CNPJ masked
     *
     * @throws \Exception Invalid length
     */
    function mask_cnpj(string|int $cnpj): string
    {
        return Mask::cnpj($cnpj);
    }
}

if (! function_exists('mask_phone')) {
    /**
     * Mask phone
     *
     * @param  string|int  $phone Value to mask
     *
     * @return string Phone masked
     *
     * @throws \Exception Invalid length
     */
    function mask_phone(string|int $phone): string
    {
        return Mask::phone($phone);
    }
}

if (! function_exists('mask_cep')) {
    /**
     * Mask CEP
     *
     * @param  string|int  $cep Value to mask
     *
     * @return string CEP masked
     *
     * @throws \Exception Invalid length
     */
    function mask_cep(string|int $cep): string
    {
        return Mask::cep($cep);
    }
}

if (! function_exists('mask_custom')) {
    /**
     * Mask custom
     *
     * @param  string|int  $value Value to mask
     * @param  string  $mask Mask format
     * @param  int|bool  $padType [optional] STR_PAD_LEFT, STR_PAD_RIGHT, STR_PAD_BOTH or false to disable padding (default: STR_PAD_LEFT)
     *
     * @return string Masked value
     *
     * @throws \Exception Invalid length
     */
    function mask_custom(string|int $value, string $mask, int|bool $padType = STR_PAD_LEFT): string
    {
        return Mask::custom($value, $mask, $padType);
    }
}
