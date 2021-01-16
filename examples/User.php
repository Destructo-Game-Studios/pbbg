<?php

namespace DestructoExamples;

use Destructo\Traits\HasHealth;
use Destructo\Traits\HasWallet;

class User {
    use HasWallet;
    use HasHealth;

    protected $fillable = [
        'health',
        'maxHealth',
        'cash'
    ];

    protected static function booted() {
        static::retrieved(function ($user) {
            $user->initGameTraits();
        });
    }

    public function initGameTraits() {
        $this->initializeHealth($this->health, $this->maxHealth);
        $this->initWallet($this->cash);
    }
}
