<?php

namespace Bav\Validator\De;

/**
 * Test class for System87.
 * Generated by PHPUnit on 2012-07-05 at 19:22:55.
 */
class System87Test extends \Bav\Test\SystemTestCase
{

    public function testWithValidAccountReturnsTrue()
    {
        $validAccounts = array('406', '51768', '10701590', '10720185', '100005', '950360');

        foreach ($validAccounts as $account) {
            $validator = new System87($this->bank);
            $this->assertTrue($validator->isValid($account));
        }
    }

    public function testWithInvalidAccountReturnsFalse()
    {
        $validAccounts = array('223400', '9858115');

        foreach ($validAccounts as $account) {
            $validator = new System87($this->bank);
            $this->assertFalse($validator->isValid($account));
        }
    }

}