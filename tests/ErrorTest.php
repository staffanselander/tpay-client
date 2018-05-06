<?php

namespace StaffanSelander\Tpay\Tests;

use StaffanSelander\Tpay\Error;
use StaffanSelander\Tpay\Tests\Base\BaseCase;

class ErrorTest extends BaseCase
{
    public function test_error_can_translate_error_code_into_message()
    {
        $error = new Error('ERR31');

        $this->assertEquals('Access disabled', $error->getMessage(), 'Error should translate ERR31 into "Access disabled".');
        $this->assertEquals('ERR31', $error->getError(), 'Error should also hold error code.');
    }
}
