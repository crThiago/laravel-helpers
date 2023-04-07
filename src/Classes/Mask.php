<?php

declare(strict_types=1);

namespace Crthiago\LaravelHelpers\Classes;

final class Mask
{
    /**
     * Mask CPF
     *
     * @param  string|int  $cpf Value to mask
     *
     * @return string CPF masked
     *
     * @throws \Exception Invalid length
     */
    public static function cpf(string|int $cpf): string
    {
        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        if (strlen($cpf) !== 11) {
            throw new \Exception('Invalid CPF number: ' . $cpf);
        }
        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpf);
    }

    /**
     * Mask CNPJ
     *
     * @param  string|int  $cnpj Value to mask
     *
     * @return string CNPJ masked
     *
     * @throws \Exception Invalid length
     */
    public static function cnpj(string|int $cnpj): string
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
        if (strlen($cnpj) !== 14) {
            throw new \Exception('Invalid CNPJ number: ' . $cnpj);
        }
        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj);
    }

    /**
     * Mask phone
     *
     * @param  string|int  $phone Value to mask
     *
     * @return string Phone masked
     *
     * @throws \Exception Invalid length
     */
    public static function phone(string|int $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', (string) $phone);
        if (strlen($phone) < 10 || strlen($phone) > 11) {
            throw new \Exception('Invalid phone number: ' . $phone);
        }
        return preg_replace('/(\d{2})(\d{5}|\d{4})(\d{4})/', '($1) $2-$3', $phone);
    }

    /**
     * Mask CEP
     *
     * @param  string|int  $cep Value to mask
     *
     * @return string CEP masked
     *
     * @throws \Exception Invalid length
     */
    public static function cep(string|int $cep): string
    {
        $cep = preg_replace('/[^0-9]/', '', (string) $cep);
        $cep = str_pad($cep, 8, '0', STR_PAD_LEFT);
        if (strlen($cep) !== 8) {
            throw new \Exception('Invalid CEP number: ' . $cep);
        }
        return preg_replace(self::cepFormatDefault(), '$1-$2', $cep);
    }

    /**
     * Custom mask
     *
     * @param  string|int  $value Value to mask
     * @param  string  $mask Mask format
     * @param  int|bool  $padType [optional] STR_PAD_LEFT, STR_PAD_RIGHT, STR_PAD_BOTH or false to disable padding (default: STR_PAD_LEFT)
     *
     * @return string Masked value
     *
     * @throws \Exception Invalid length
     */
    public static function custom(string|int $value, string $mask, int|bool $padType = STR_PAD_LEFT): string
    {
        $value = preg_replace('/[^0-9]/', '', (string) $value);
        $lengthMask = self::lengthHashtag($mask);
        if ($padType !== false) {
            $value = str_pad($value, self::lengthHashtag($mask), '0', $padType);
        } elseif (strlen($value) < $lengthMask || strlen($value) > $lengthMask) {
            throw new \Exception('Invalid value: ' . $value);
        }

        $maskared = '';
        for ($i = 0, $k = 0, $length = strlen($mask); $i < $length; $i++) {
            if ($mask[$i] === '#' && isset($value[$k])) {
                $maskared .= $value[$k++];
            } elseif (isset($mask[$i])) {
                $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

    private static function lengthHashtag(string $string): int
    {
        for ($i = 0, $count = 0, $length = strlen($string); $i < $length; $i++) {
            if ($string[$i] === '#') {
                $count++;
            }
        }
        return $count;
    }

    private static function cepFormatDefault(): string
    {
        return '/(\d{5})(\d{3})/';
    }
}
