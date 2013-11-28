<?php

namespace Bav\Validator\De;

/**
 * Test class for SystemB5.
 * Generated by PHPUnit on 2012-07-05 at 19:22:55.
 */
class SystemB5Test extends \Bav\Test\SystemTestCase
{

    public function testWithValidAccountReturnsTrue()
    {
        $validAccounts = array('159006955', '2000123451', '123456782', '130098767');

        foreach ($validAccounts as $account) {
            $validator = new SystemB5($this->bank);
            $this->assertTrue($validator->isValid($account));
        }
    }

    public function testWithInvalidAccountReturnsFalse()
    {
        $validAccounts = array('864089000', '87096000');

        foreach ($validAccounts as $account) {
            $validator = new SystemB5($this->bank);
            $this->assertFalse($validator->isValid($account));
        }
    }

}