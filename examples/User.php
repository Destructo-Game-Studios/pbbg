<?php

namespace DestructoExamples;

use Destructo\Traits\HasHealth;
use Destructo\Traits\HasWallet;

/**
 * Laravel Eloquent Model Example
 * ==============================
 * 
 * This is a trimmed example that shows just what is required to be added to the default User model in Laravel
 * to make it work with Destructo PBBG.
 * 
 * The booted method is an event that fires after the model has been hydrated. You will need to include records
 * in the database for health, max health, and the cash on hand -- labeled health, maxHealth, and cash -- which
 * are used to initialize the models upon page load.
 * 
 * This is just one way to do things, though. It is necessary to hydrate these components so they can be used by
 * the rest of the framework, but where that happens doesn't matter.
 */

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
