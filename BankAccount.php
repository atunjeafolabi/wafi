<?php

namespace Wafi;

class BankAccount
{
    const ZERO_BALANCE = 0;

    private $balance = 0;

    public function deposit($amount)
    {
        if($amount < self::ZERO_BALANCE){
            throw new \RuntimeException("Negative deposit not allowed");
        }

        $this->balance += $amount;

        return true;
    }

    public function withdraw($amount) : bool
    {
        if($amount < self::ZERO_BALANCE){
            throw new \RuntimeException("Negative withdrawal amount not allowed");
        }

        if(!$this->hasSufficientBalance($amount)){
            throw new \RuntimeException("Insufficient balance");
        }

        $this->balance -= $amount;

        return true;
    }

    public function getBalance() : int
    {
        return $this->balance;
    }

    /**
     * @param $amount
     *
     * @return bool
     */
    private function hasSufficientBalance($amount) : bool
    {
        return $amount < $this->getBalance();
    }

    public function transferFunds($amount, User $beneficiary)
    {
        if(!$this->hasSufficientBalance($amount)){
            throw new \RuntimeException("Insufficient balance");
        }

        $this->balance -= $amount;

        // add the deducted amount to the beneficiary
        $beneficiary->getAccount()->deposit($amount);

        return true;
    }
}
