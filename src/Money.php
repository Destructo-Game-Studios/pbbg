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

    public function __get(string $attribute) : int {
        /** @var int */
        return $this->$attribute;
    }
}