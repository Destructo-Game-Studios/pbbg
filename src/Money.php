<?php

namespace Destructo;

use Destructo\Traits\IsImmutable;

class Money {
    use IsImmutable;

    protected int $amount;

    public function __construct(int $amount) {
        $this->amount = $amount;
    }

    public function increase(int $amount) : Money {
        return new Money($this->amount + $amount);
    }

    public function decrease(int $amount) : Money {
        return $this->increase($amount * -1);
    }

    public function atLeast(int $amount) : bool {
        return $this->amount >= $amount;
    }

    public function under(int $amount) : bool {
        return $this->amount < $amount;
    }

}