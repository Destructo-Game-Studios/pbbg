<?php

namespace Destructo;

class Character {
    protected string $name;
    protected Money $wallet;
    protected Abilities $abilities;

    public function __construct(string $name, Money $wallet, Abilities $abilities){
        $this->name = $name;
        $this->wallet = $wallet;
        $this->abilities = $abilities;
    }

    public function __get(string $attribute) {
        /** @var string */
        return $this->$attribute;
    }
}