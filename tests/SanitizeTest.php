<?php


use Orchestra\Testbench\TestCase;

class SanitizeTest extends TestCase
{
    public function test_remove_accents()
    {
        $this->assertEquals('aaaaa', remove_accents('áàãâä'));
        $this->assertEquals('eeee', remove_accents('éèêë'));
        $this->assertEquals('iiii', remove_accents('íìîï'));
        $this->assertEquals('ooooo', remove_accents('óòõôö'));
        $this->assertEquals('uuuu', remove_accents('úùûü'));
        $this->assertEquals('c', remove_accents('ç'));
        $this->assertEquals('AAAAA', remove_accents('ÁÀÃÂÄ'));
        $this->assertEquals('EEEE', remove_accents('ÉÈÊË'));
        $this->assertEquals('IIII', remove_accents('ÍÌÎÏ'));
        $this->assertEquals('OOOOO', remove_accents('ÓÒÕÔÖ'));
        $this->assertEquals('UUUU', remove_accents('ÚÙÛÜ'));
        $this->assertEquals('C', remove_accents('Ç'));
    }


    public function test_remove_special_characters()
    {
        $this->assertEquals('abc123', remove_special_characters('abc123'));
        $this->assertEquals('abc123', remove_special_characters('abc123!@#$%&*()'));
        $this->assertEquals('abc123', remove_special_characters('abc123!@#$%&*()áàãâäéèêëíìîïóòõôöúùûüç'));
    }
}