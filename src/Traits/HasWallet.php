<?php

namespace Destructo\Traits;

use Destructo\Money;

trait HasWallet {
    private Money $wallet;

    private function initWallet(int $amount = 0) : void {
        $this->wallet = new Money($amount);
    }
}
