<?php

namespace Bav\Validator\De;

/**
 * Test class for System78.
 * Generated by PHPUnit on 2012-07-05 at 19:22:55.
 */
class System78Test extends SystemTestCase
{

    public function testWithValidAccountReturnsTrue()
    {
        $validAccounts = array('7581499', '9999999981');

        foreach ($validAccounts as $account) {
            $validator = new System78($this->bankId);
            $this->assertTrue($validator->isValid($account));
        }
    }

    public function testWithInvalidAccountReturnsFalse()
    {
        $validAccounts = array('223456600', '45555555');

        foreach ($validAccounts as $account) {
            $validator = new System78($this->bankId);
            $this->assertFalse($validator->isValid($account));
        }
    }

}