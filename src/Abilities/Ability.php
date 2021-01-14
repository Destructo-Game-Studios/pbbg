<?php

namespace Destructo\Abilities;

use Destructo\Traits\IsImmutable;

class Ability {

    use IsImmutable;

    protected string $name;
    protected int $amount;

    public function __construct( string $name, int $amount) {

        $this->name = $name;
        $this->amount = $amount;

    }

    public function abilityCheck( int $target ) : bool {
        return ( $this->amount + mt_rand(1,20) ) > $target; 

    }

}