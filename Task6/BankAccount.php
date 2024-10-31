<?php

namespace Task6;

use Exception;

require_once 'AccountInterface.php';

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    public function __construct($currency, $balance = 0) {
        $this->currency = $currency;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для поповнення має бути позитивною.");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття має бути позитивною.");
        }
        if ($this->balance - $amount < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів.");
        }
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance;
    }
}
