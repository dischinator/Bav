<?php

namespace Bav\Validator\De;

/**
 * Test class for System54.
 * Generated by PHPUnit on 2012-07-05 at 19:22:55.
 */
class System54Test extends SystemTestCase
{

    public function testWithValidAccountReturnsTrue()
    {
        $validAccounts = array('4964137395', '4900010987');

        foreach ($validAccounts as $account) {
            $validator = new System54($this->bankId);
            $this->assertTrue($validator->isValid($account));
        }
    }

    public function testWithInvalidAccountReturnsFalse()
    {
        $validAccounts = array('0099345678', '4912345678');

        foreach ($validAccounts as $account) {
            $validator = new System54($this->bankId);
            $this->assertFalse($validator->isValid($account));
        }
    }

}