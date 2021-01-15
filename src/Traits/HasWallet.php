<?php

namespace Destructo\Traits;

use Destructo\Money;

trait HasWallet {
    protected Money $wallet;

    protected function initWallet(int $amount = 0) : void {
        $this->wallet = new Money($amount);
    }
}
