<?php


use Orchestra\Testbench\TestCase;

class ValidateTest extends TestCase
{
    public function test_cpf()
    {
        $this->assertFalse(validate_cpf('12345678901'));

        $this->assertTrue(validate_cpf('034.885.060-37'));
        $this->assertTrue(validate_cpf('03488506037'));

        $this->assertTrue(validate_cpf(3488506037));
        $this->assertTrue(validate_cpf('3488506037'));
    }

    public function test_cnpj()
    {
        $this->assertFalse(validate_cnpj('12345678901234'));

        $this->assertTrue(validate_cnpj('29.848.999/0001-05'));
        $this->assertTrue(validate_cnpj('08953655000196'));

        $this->assertTrue(validate_cnpj(8953655000196));
        $this->assertTrue(validate_cnpj('8.953.655/0001-96'));
    }
}