<?php

use Task6\BankAccount;
use Task6\SavingsAccount;

require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

try {
    $account1 = new BankAccount("USD", 100);
    $account1->deposit(50);
    echo "Баланс після поповнення: " . $account1->getBalance() . " USD\n";

    $account1->withdraw(30);
    echo "Баланс після зняття: " . $account1->getBalance() . " USD\n";

    $savingsAccount = new SavingsAccount("USD", 200);
    $savingsAccount->applyInterest();
    echo "Баланс після нарахування відсотків: " . $savingsAccount->getBalance() . " USD\n";

    $account1->withdraw(150);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}

try {
    $account1->deposit(-20);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}
