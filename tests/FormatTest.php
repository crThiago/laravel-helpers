<?php

use Orchestra\Testbench\TestCase;

class FormatTest extends TestCase
{
    protected function defineEnvironment($app)
    {
        $app['config']->set('php-helpers.date_format', 'd/m/Y');
        $app['config']->set('php-helpers.datetime_format', 'd/m/Y H:i:s');
    }

    public function test_money()
    {
        $this->assertEquals('R$ 1.000,00', money(1000));
        $this->assertEquals('R$ 0,50', money('0.5'));
        $this->assertEquals('R$ 0,50', money(0.5));
        $this->assertEquals('1.000,00', money(1000, false));
        $this->assertEquals('1.000,00', money('1000', false));
        $this->assertEquals('$ 1.50', money(1.5, '$ ', 2, '.', ''));
        $this->assertEquals('1.000.000,33', money(1000000.33, false));
    }

    public function test_number_db()
    {
        $this->assertEquals(1000, number_db('1.000'));
        $this->assertEquals(1000.5, number_db('1.000,5'));
        $this->assertEquals(1000.5, number_db('1.000,50'));
        $this->assertEquals(0.5, number_db('0,50'));
        $this->assertEquals(1000.5, number_db('R$ 1.000,50'));
        $this->assertEquals(1000.5, number_db('$ 1,000.50', ','));
    }


    public function test_date()
    {
        $this->assertEquals('01/02/2018', format_date('2018-02-01'));
        $this->assertEquals('02/01/2018', format_date('2018-02-01', 'm/d/Y'));
        $this->assertEquals('01/02/2018', format_date('2018-02-01 12:00:00'));
    }

    public function test_datetime()
    {
        $this->assertEquals('01/02/2018 12:00:00', datetime('2018-02-01 12:00:00'));
        $this->assertEquals('02/01/2018 12:00:00', datetime('2018-02-01 12:00:00', 'm/d/Y H:i:s'));
    }

    public function test_date_db()
    {
        $this->assertEquals('2018-02-01', date_db('01/02/2018'));
        $this->assertEquals('2018-12-31', date_db('12/31/2018', 'm/d/Y'));
        //todo $this->assertEquals('2018-02-01', datetime_db('01/02/2018 12:30:00'));
    }

    public function test_datetime_db()
    {
        $this->assertEquals('2018-02-01 12:30:00', datetime_db('01/02/2018 12:30:00'));
        $this->assertEquals('2018-12-31 12:00:00', datetime_db('12/31/2018 12:00:00', 'm/d/Y H:i:s'));
    }
}