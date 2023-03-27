<?php

use Crthiago\LaravelHelpers\Classes\Format;
use Crthiago\LaravelHelpers\Classes\Mask;
use Crthiago\LaravelHelpers\Classes\Sanitize;
use Crthiago\LaravelHelpers\Classes\Validate;

if (!function_exists('validate_cpf')) {
    /**
     * Validate CPF
     *
     * @param  string|int  $cpf
     * @return bool
     */
    function validate_cpf(string|int $cpf): bool {
        return Validate::cpf($cpf);
    }
}

if (!function_exists('validate_cnpj')) {
    /**
     * Validate CNPJ
     *
     * @param  string|int  $cnpj
     * @return bool
     */
    function validate_cnpj(string|int $cnpj): bool {
        return Validate::cnpj($cnpj);
    }
}

if (!function_exists('money')) {
    /**
     * Format money
     *
     * @param  float|string  $number
     * @param  string|bool  $prefix
     * @param  int  $decimals
     * @param  string  $decimalSeparator
     * @param  string  $thousandSeparator
     * @return string
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

if (!function_exists('number_db')) {
    /**
     * Format number to database
     *
     * @param  float|string  $number
     * @param  string  $thousandSeparator
     * @return float
     */
    function number_db(string $number, string $thousandSeparator = '.'): float {
        return Format::numberDb($number, $thousandSeparator);
    }
}

if (!function_exists('format_date')) {
    /**
     * Format date
     *
     * @param  string  $date
     * @param  string|null  $format
     * @return string
     */
    function format_date(string $date, string|null $format = null): string {
        return Format::date($date, $format);
    }
}

if (!function_exists('datetime')) {
    /**
     * Format datetime
     *
     * @param  string  $date
     * @param  string|null  $format
     * @return string
     */
    function datetime(string $date, string|null $format = null): string {
        return Format::datetime($date, $format);
    }
}

if (!function_exists('date_db')) {
    /**
     * Format date to database
     *
     * @param  string  $date
     * @param  string|null  $format
     * @return string
     */
    function date_db(string $date, string|null $format = null): string {
        return Format::dateDb($date, $format);
    }
}

if (!function_exists('datetime_db')) {
    /**
     * Format datetime to database
     *
     * @param  string  $date
     * @param  string|null  $format
     * @return string
     */
    function datetime_db(string $date, string|null $format = null): string {
        return Format::datetimeDb($date, $format);
    }
}

if (!function_exists('remove_accents')) {
    /**
     * Remove accents
     *
     * @param  string  $string
     * @return string
     */
    function remove_accents(string $string): string {
        return Sanitize::removeAccents($string);
    }
}

if (!function_exists('remove_special_characters')) {
    /**
     * Remove special characters
     *
     * @param  string  $string
     * @return string
     */
    function remove_special_characters(string $string): string {
        return Sanitize::removeSpecialCharacters($string);
    }
}

if (!function_exists('mask_cpf')) {
    /**
     * Mask CPF
     *
     * @param  string|int  $cpf
     * @return string
     */
    function mask_cpf(string|int $cpf): string {
        return Mask::cpf($cpf);
    }
}

if (!function_exists('mask_cnpj')) {
    /**
     * Mask CNPJ
     *
     * @param  string|int  $cnpj
     * @return string
     */
    function mask_cnpj(string|int $cnpj): string {
        return Mask::cnpj($cnpj);
    }
}

if (!function_exists('mask_phone')) {
    /**
     * Mask phone
     *
     * @param  string|int  $phone
     * @return string
     */
    function mask_phone(string|int $phone): string {
        return Mask::phone($phone);
    }
}

if (!function_exists('mask_cep')) {
    /**
     * Mask CEP
     *
     * @param  string|int  $cep
     * @return string
     */
    function mask_cep(string|int $cep): string {
        return Mask::cep($cep);
    }
}

if (!function_exists('mask_custom')) {
    /**
     * Mask custom
     *
     * @param  string  $value
     * @param  string  $mask
     * @param  int|bool  $padType
     * @return string
     */
    function mask_custom(string $value, string $mask, int|bool $padType = STR_PAD_LEFT): string {
        return Mask::custom($value, $mask, $padType);
    }
}