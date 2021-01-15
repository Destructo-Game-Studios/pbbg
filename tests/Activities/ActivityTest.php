<?php

namespace DestructoTest\Activities;

use Destructo\Abilities\Ability;
use Destructo\Activity;
use Destructo\Money;

class ActivityTest extends \PHPUnit\Framework\TestCase {
    public function testActivityReturnsMoneyObject() {
        $ability = new Ability('strength', 0);
        $activity = new Activity($ability, 0, 100);

        $result = $activity->do();

        $this->assertInstanceOf(Money::class, $result);
    }

    public function testActivityReturnsZeroMoneyIfAbilityCheckFails() {
        $ability = new Ability('strength', 0);

        $activity = new Activity($ability, 1000, 100);
        
        $money = $activity->do();

        $this->assertEquals(0, $money->amount);
    }

    public function testActivityReturnsCorrectMoneyIfAbilityCheckSucceeds() {
        $ability = new Ability('strength', 100);

        $activity = new Activity($ability, 0, 100);
        
        $money = $activity->do();

        $this->assertEquals(100, $money->amount);
    }

    public function testActivityIsCallable() {
        $ability = new Ability('strength', 0);
        $activity = new Activity($ability, 0, 100);

        $result = $activity();

        $this->assertInstanceOf(Money::class, $result);
    }
    
    
}