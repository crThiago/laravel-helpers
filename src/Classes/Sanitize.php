<?php

namespace Crthiago\LaravelHelpers\Classes;

class Sanitize
{
    /**
     * Remove accents from string
     *
     * @param string $string
     * @return string
     */
    public static function removeAccents(string $string): string
    {
        $string = preg_replace('/[áàãâä]/u', 'a', $string); // substitui todos os acentos "a"
        $string = preg_replace('/[éèêë]/u', 'e', $string); // substitui todos os acentos "e"
        $string = preg_replace('/[íìîï]/u', 'i', $string); // substitui todos os acentos "i"
        $string = preg_replace('/[óòõôö]/u', 'o', $string); // substitui todos os acentos "o"
        $string = preg_replace('/[úùûü]/u', 'u', $string); // substitui todos os acentos "u"
        $string = preg_replace('/[ç]/u', 'c', $string); // substitui o cedilha "ç"
        $string = preg_replace('/[ÁÀÃÂÄ]/u', 'A', $string); // substitui todos os acentos "A"
        $string = preg_replace('/[ÉÈÊË]/u', 'E', $string); // substitui todos os acentos "E"
        $string = preg_replace('/[ÍÌÎÏ]/u', 'I', $string); // substitui todos os acentos "I"
        $string = preg_replace('/[ÓÒÕÔÖ]/u', 'O', $string); // substitui todos os acentos "O"
        $string = preg_replace('/[ÚÙÛÜ]/u', 'U', $string); // substitui todos os acentos "U"
        return preg_replace('/[Ç]/u', 'C', $string);
    }

    /**
     * Remove special characters from string
     *
     * @param string $string
     * @return string
     */
    public static function removeSpecialCharacters(string $string): string
    {
        return preg_replace('/[^a-zA-Z0-9]/', '', $string);
    }
}