<?php

namespace Bav\Validator\De;

/**
 * Test class for SystemD2.
 * Generated by PHPUnit on 2012-07-05 at 19:22:55.
 */
class SystemD2Test extends SystemTestCase
{

    public function testWithValidAccountReturnsTrue()
    {
        $validAccounts = array('189912137', '4455667784', '51181008');

        foreach ($validAccounts as $account) {
            $validator = new SystemD2($this->bankId);
            $this->assertTrue($validator->isValid($account));
        }
    }

    public function testWithInvalidAccountReturnsFalse()
    {
        $validAccounts = array('6414241', '179751314');

        foreach ($validAccounts as $account) {
            $validator = new SystemD2($this->bankId);
            $this->assertFalse($validator->isValid($account));
        }
    }

}