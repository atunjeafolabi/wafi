<?php

namespace Wafi;

require_once "vendor/autoload.php";

$sam = new User("Sam Joe", new BankAccount());
$samAccount = $sam->getAccount();
echo "Sam's initial balance: " . $samAccount->getBalance() . "\n";                     // 0

$samAccount->deposit(100);
echo "Sam's balance after deposit of 100: " . $samAccount->getBalance() . "\n";

$samAccount->withdraw(20);
echo "Sam's balance after withdrawal of 20: " . $samAccount->getBalance() . "\n";      // 80

$ken = new User("Ken", new BankAccount());
$kenAccount = $ken->getAccount();
echo "Ken's initial balance: " . $kenAccount->getBalance() . "\n";                 // 0

$samAccount->transferFunds(50, $ken);

echo "Sam's balance after transfer of 50 to Ken: " . $samAccount->getBalance() . "\n";      // 30
echo "Ken should now have: " . $kenAccount->getBalance() . "\n";      // 50

// trying to withdraw negative amount should throw exception
//$kenAccount->withdrawFunds(-10);


