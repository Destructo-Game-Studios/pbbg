<?php

namespace Destructo;

use Destructo\Abilities\Ability;
use Destructo\Money;

abstract class Activity {
    protected Ability $ability;
    protected int $difficulty;
    protected int $reward;

    public function __construct(Ability $ability, int $difficulty, int $reward) {
        $this->ability = $ability;
        $this->difficulty = $difficulty;
        $this->reward = $reward;
    }

    public function do() : Money {
        if (!$this->ability->abilityCheck($this->difficulty)) {
            $this->onFailure();
            return new Money(0);
        }

        $this->onSuccess();
        return new Money($this->reward);
    }

    public function __invoke() {
        return $this->do();
    }

    abstract protected function onSuccess();
    abstract protected function onFailure();

}
