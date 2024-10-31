<?php

namespace Task6;

interface AccountInterface {
    public function deposit($amount);
    public function withdraw($amount);
    public function getBalance();
}

