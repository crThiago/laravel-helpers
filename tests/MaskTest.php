<?php


use Orchestra\Testbench\TestCase;

class MaskTest extends TestCase
{
    protected function defineEnvironment($app)
    {
        $app['config']->set('php-helpers.mask_cep', '/(\d{5})(\d{3})/');
    }

    public function test_mask_cpf()
    {
        $this->assertEquals('123.456.789-00', mask_cpf('12345678900'));
        $this->assertEquals('123.456.789-00', mask_cpf(12345678900));
        $this->assertEquals('000.000.000-12', mask_cpf(12));
        $this->assertEquals('023.456.789-00', mask_cpf('cpf: 023.456.789-00'));
        try {
            mask_cpf(123456789002322);
        } catch (\Exception $e) {
            $this->assertEquals('Invalid CPF number: 123456789002322', $e->getMessage());
        }
    }

    public function test_mask_cnpj()
    {
        $this->assertEquals('12.345.678/0001-90', mask_cnpj('12345678000190'));
        $this->assertEquals('12.345.678/0001-90', mask_cnpj(12345678000190));
        $this->assertEquals('00.000.000/0001-90', mask_cnpj(190));
        $this->assertEquals('12.345.678/0001-90', mask_cnpj('cnpj: 12.345.678/0001-90'));
        try {
            mask_cnpj(123456780001902322);
        } catch (\Exception $e) {
            $this->assertEquals('Invalid CNPJ number: 123456780001902322', $e->getMessage());
        }
    }

    public function test_mask_phone()
    {
        $this->assertEquals('(12) 34567-8901', mask_phone('12345678901'));
        $this->assertEquals('(12) 34567-8901', mask_phone(12345678901));
        $this->assertEquals('(12) 3456-7890', mask_phone(1234567890));
        $this->assertEquals('(12) 34567-8901', mask_phone('phone: (12) 34567-8901'));
        try {
            mask_phone('123');
        } catch (\Exception $e) {
            $this->assertEquals('Invalid phone number: 123', $e->getMessage());
        }
        try {
            mask_phone('12342321321321567890');
        } catch (\Exception $e) {
            $this->assertEquals('Invalid phone number: 12342321321321567890', $e->getMessage());
        }
    }

    public function test_mask_cep()
    {
        $this->assertEquals('12345-678', mask_cep('12345678'));
        $this->assertEquals('12345-678', mask_cep(12345678));
        $this->assertEquals('12345-678', mask_cep('cep: 12345-678'));
        try {
            mask_cep('12342321321321567890');
        } catch (\Exception $e) {
            $this->assertEquals('Invalid CEP number: 12342321321321567890', $e->getMessage());
        }
    }

    public function test_mask_custom()
    {
        $this->assertEquals('123.456.789-00', mask_custom('12345678900', '###.###.###-##'));
        $this->assertEquals('123.456.789-00', mask_custom(12345678900, '###.###.###-##'));
        $this->assertEquals('000.000.000-12', mask_custom(12, '###.###.###-##'));
        $this->assertEquals('023.456.789-00', mask_custom('cpf: 023.456.789-00', '###.###.###-##'));
        try {
            mask_custom(123456789002322, '###.###.###-##', false);
        } catch (\Exception $e) {
            $this->assertEquals('Invalid value: 123456789002322', $e->getMessage());
        }

        try {
            mask_custom(12, '###.###.###-##', false);
        } catch (\Exception $e) {
            $this->assertEquals('Invalid value: 12', $e->getMessage());
        }
    }
}