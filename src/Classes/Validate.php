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
        // Calcula e confere primeiro dígito verificador
        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--) {
            $soma += $cpf[$i] * $j;
        }
        $resto = $soma % 11;
        if ($cpf[9] != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }
        // Calcula e confere segundo dígito verificador
        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--) {
            $soma += $cpf[$i] * $j;
        }
        $resto = $soma % 11;
        return $cpf[10] == ($resto < 2 ? 0 : 11 - $resto);
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
        // Calcula e confere primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = $j == 2 ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }
        // Calcula e confere segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = $j == 2 ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    private static function cleanNumber(string|int $number, int $length): string
    {
        $number = preg_replace('/[^0-9]/', '', (string) $number);
        return str_pad($number, $length, '0', STR_PAD_LEFT);
    }
}
