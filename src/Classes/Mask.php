<?php

namespace Crthiago\LaravelHelpers\Classes;

class Mask
{
    /**
     * Mask CPF
     *
     * @param  string|int  $cpf
     * @return string
     * @throws \Exception
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
     * @param  string|int  $cnpj
     * @return string
     * @throws \Exception
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
     * @param  string|int  $phone
     * @return string
     * @throws \Exception
     */
    public static function phone(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', (string) $phone);
        if (strlen($phone) < 10 || strlen($phone) > 11) {
            throw new \Exception('Invalid phone number: ' . $phone);
        }
        return preg_replace('/(\d{2})(\d{5}|\d{4})(\d{4})/', '($1) $2-$3', $phone);
    }

    public static function cep(string|int $cep): string
    {
        $cep = preg_replace('/[^0-9]/', '', (string) $cep);
        $cep = str_pad($cep, 8, '0', STR_PAD_LEFT);
        if (strlen($cep) !== 8) {
            throw new \Exception('Invalid CEP number: ' . $cep);
        }
        return preg_replace(self::cepFormatDefault(), '$1-$2', $cep);
    }

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
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] === '#') {
                if (isset($value[$k])) {
                    $maskared .= $value[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }
        return $maskared;
    }

    private static function lengthHashtag(string $string): int
    {
        $count = 0;
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] === '#') {
                $count++;
            }
        }
        return $count;
    }

    private static function cepFormatDefault()
    {
        return '/(\d{5})(\d{3})/';
    }
}