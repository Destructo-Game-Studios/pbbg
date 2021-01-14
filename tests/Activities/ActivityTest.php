<?php

namespace DestructoTest\Activities;

use Destructo\Abilities\Ability;
use Destructo\Activity;
use Destructo\Money;

class ActivityTest extends \PHPUnit\Framework\TestCase {
    public function testActivityReturnsMoneyObject() {
        $activity = new Activity();
        $ability = new Ability('strength', 0);

        $result = $activity->do($ability, 0, 100);

        $this->assertInstanceOf(Money::class, $result);
    }

    public function testActivityReturnsZeroMoneyIfAbilityCheckFails() {
        $ability = new Ability('strength', 0);

        $activity = new Activity();
        
        $money = $activity->do($ability, 1000, 100);

        $this->assertEquals(0, $money->amount);
    }

    public function testActivityReturnsCorrectMoneyIfAbilityCheckSucceeds() {
        $ability = new Ability('strength', 100);

        $activity = new Activity();
        
        $money = $activity->do($ability, 0, 100);

        $this->assertEquals(100, $money->amount);
    }
    
}