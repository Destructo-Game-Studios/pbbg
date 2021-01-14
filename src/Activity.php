<?php

namespace Destructo;

use Destructo\Abilities\Ability;
use Destructo\Money;

class Activity {
    public function do(Ability $ability, int $target, int $reward) : Money {

        if(!$ability->abilityCheck( $target )) {
            return new Money(0);
        }

        return new Money($reward);

    }
}