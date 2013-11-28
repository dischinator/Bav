<?php

namespace Bav\Validator\De;

/**
 * Test class for System63.
 * Generated by PHPUnit on 2012-07-05 at 19:22:55.
 */
class System63Test extends \Bav\Test\SystemTestCase
{

    public function testWithValidAccountReturnsTrue()
    {
        $validAccounts = array('123456600', '1234566');

        foreach ($validAccounts as $account) {
            $validator = new System63($this->bank);
            $this->assertTrue($validator->isValid($account));
        }
    }

    public function testWithInvalidAccountReturnsFalse()
    {
        $validAccounts = array('0099345678', '4912345678');

        foreach ($validAccounts as $account) {
            $validator = new System63($this->bank);
            $this->assertFalse($validator->isValid($account));
        }
    }

}