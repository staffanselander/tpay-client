<?php

namespace StaffanSelander\Tpay\Tests\Base;


use Closure;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class TestCaseBase
 *
 * @package StaffanSelander\Tpay\Tests
 */
abstract class BaseCase extends TestCase
{
    /**
     * @param string $expected
     * @param Closure $closure
     * @param string $message
     */
    protected function assertException(string $expected, Closure $closure, string $message = ''): void
    {
        try
        {
            $closure();
            $this->expectException($expected);
        }
        catch (Exception $actual)
        {
            $this->assertInstanceOf($expected, $actual, $message);
        }
    }
}
