<?php

namespace Destructo;

use Destructo\Exception\ImmutabilityException;

class Money {
    protected $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function __get($attribute) {
        return $this->amount;
    }

    public function __set($attribute, $value){
        throw new ImmutabilityException("Attempt to set protected attribute \Destructo\Money::$attribute to $value");
    }
}