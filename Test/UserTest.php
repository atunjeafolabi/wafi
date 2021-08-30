<?php

namespace Wafi\Test;

use PHPUnit\Framework\TestCase;
use Wafi\BankAccount;
use Wafi\User;

class UserTest extends TestCase
{
    public function test_that_a_new_user_can_have_an_account()
    {
        $john = new User("John", new BankAccount());

        $this->assertInstanceOf(BankAccount::class, $john->getAccount());
    }
}
