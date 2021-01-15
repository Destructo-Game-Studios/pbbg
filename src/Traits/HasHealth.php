<?php

namespace Destructo\Traits;

trait HasHealth {
    private int $health;
    private int $maxHealth;

    private function initializeHealth(int $health, int $maxHealth) : void {
        $this->health = $health;
        $this->maxHealth = $maxHealth;
    }

    public function currentHealth() : int {
        return $this->health;
    }

    public function maxHealth() : int {
        return $this->maxHealth;
    }

    public function healthPercent() : int {
        return ($this->health / $this->maxHealth) * 100;
    }

    public function damage(int $damage) : self {
        if (abs($damage) != $damage) {
            return $this->heal(abs($damage));
        }

        $this->health -= abs($damage);
        return $this;
    }

    public function heal(int $heal) : self {
        if (abs($heal) != $heal) {
            return $this->damage(abs($heal));
        }

        $this->health += abs($heal);
        return $this;
    }

    public function isDead() : bool {
        return $this->health <= 0;
    }
}
