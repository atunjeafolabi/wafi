<?php

namespace Wafi\Test;

use PHPUnit\Framework\TestCase;
use Wafi\BankAccount;
use Wafi\User;

class BankAccountTest extends TestCase
{
    /**
     * @var BankAccount
     */
    private $account;

    protected function setUp(): void
    {
        parent::setUp();
        $this->account = new BankAccount();
    }

    public function test_that_an_account_has_zero_balance_when_instantiated()
    {
        $this->assertEquals(0, $this->account->getBalance());
    }

    public function test_that_a_valid_amount_can_be_deposited()
    {
        $this->account->deposit(50);

        $this->assertEquals(50, $this->account->getBalance());
    }

    public function test_that_negative_amount_cannot_be_deposited()
    {
        $this->expectException(\RuntimeException::class);

        $this->account->deposit(-50);
    }

    public function test_that_withdrawal_can_be_performed_when_balance_is_sufficient()
    {
        $this->account->deposit(100);

        $this->account->withdraw(20);

        $this->assertEquals(80, $this->account->getBalance());
    }

    public function test_that_withdrawal_cannot_be_performed_when_balance_is_not_sufficient()
    {
        $this->expectException(\RuntimeException::class);

        $this->account->deposit(20);

        $this->account->withdraw(100);
    }

    public function test_that_negative_withdrawal_is_not_allowed()
    {
        $this->expectException(\RuntimeException::class);

        $this->account->withdraw(-20);
    }

    public function test_that_a_user_can_transfer_funds_when_he_has_sufficient_balance()
    {
        $adam = new User("Adam", new BankAccount());
        $adam->getAccount()->deposit(100);

        $eve = new User("Eve", new BankAccount());

        $adam->getAccount()->transferFunds(20, $eve);

        $this->assertEquals(80, $adam->getAccount()->getBalance());
        $this->assertEquals(20, $eve->getAccount()->getBalance());
    }

    public function test_that_a_user_cannot_transfer_funds_when_he_has_insufficient_balance()
    {
        $this->expectException(\RuntimeException::class);

        $adam = new User("Adam", new BankAccount());
        $adam->getAccount()->deposit(40);

        $eve = new User("Eve", new BankAccount());

        $adam->getAccount()->transferFunds(100, $eve);
    }
}
