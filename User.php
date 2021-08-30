<?php

namespace Wafi;

class User
{
    private $name;
    /**
     * @var BankAccount
     */
    private $account;

    public function __construct($name, BankAccount $account)
    {
        $this->name = $name;
        $this->account = $account;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAccount() : BankAccount
    {
        return $this->account;
    }
}
