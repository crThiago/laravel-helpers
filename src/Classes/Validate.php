<?php

declare(strict_types=1);

namespace Crthiago\LaravelHelpers\Classes;

final class Validate
{
    /**
     * Validate CPF
     *
     * @param  string|int  $cpf Number to validate
     *
     * @return bool True if valid, false otherwise
     */
    public static function cpf(string|int $cpf): bool
    {
        $cpf = self::cleanNumber($cpf, 11);
        // Verifica se todos os digitos são iguais
        if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        $dv1 = self::calculateDigit($cpf, 9, 10);
        if ($cpf[9] != $dv1) {
            return false;
        }
        $dv2 = self::calculateDigit($cpf, 10, 11);
        return $cpf[10] == $dv2;
    }

    /**
     * Validate CNPJ
     *
     * @param  string|int  $cnpj Number to validate
     *
     * @return bool True if valid, false otherwise
     */
    public static function cnpj(string|int $cnpj): bool
    {
        $cnpj = self::cleanNumber($cnpj, 14);
        // Verifica se todos os digitos são iguais
        if (strlen($cnpj) !== 14 || preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }
        $dv1 = self::calculateDigit($cnpj, 12, 5);
        if ($cnpj[12] != $dv1) {
            return false;
        }
        $dv2 = self::calculateDigit($cnpj, 13, 6);
        return $cnpj[13] == $dv2;
    }

    private static function cleanNumber(string|int $number, int $length): string
    {
        $number = preg_replace('/[^0-9]/', '', (string) $number);
        return str_pad($number, $length, '0', STR_PAD_LEFT);
    }

    private static function calculateDigit(string $number, int $position, int $factor): int
    {
        $sum = 0;
        for ($i = 0; $i < $position; $i++) {
            $sum += $number[$i] * $factor;
            $factor = $factor == 2 ? 9 : $factor - 1;
        }
        $rest = $sum % 11;
        return $rest < 2 ? 0 : 11 - $rest;
    }
}
