<?php

namespace DestructoTest\Activities;

use Destructo\Abilities\Ability;
use Destructo\Activity;
use Destructo\Money;
use DestructoTest\TestCase;

class ActivityTest extends TestCase {
    protected function getClass($ability, $difficulty, $reward) {
        return new class($ability, $difficulty, $reward) extends Activity {
            public bool $ranSuccess = false;
            public bool $ranFailure = false;
            
            protected function onSuccess() : void {
                $this->ranSuccess = true;
            }
            protected function onFailure() : void {
                $this->ranFailure = true;
            }
        };
    }
    public function testActivityReturnsMoneyObject() {
        $ability = new Ability('strength', 0);
        $activity = $this->getClass($ability, 0, 100);

        $result = $activity->do();

        $this->assertInstanceOf(Money::class, $result);
    }

    public function testActivityReturnsZeroMoneyIfAbilityCheckFails() {
        $ability = new Ability('strength', 0);

        $activity = $this->getClass($ability, 1000, 100);
        
        $money = $activity->do();

        $this->assertEquals(0, $money->amount);
    }

    public function testActivityReturnsCorrectMoneyIfAbilityCheckSucceeds() {
        $ability = new Ability('strength', 100);

        $activity = $this->getClass($ability, 0, 100);
        
        $money = $activity->do();

        $this->assertEquals(100, $money->amount);
    }

    public function testActivityIsCallable() {
        $ability = new Ability('strength', 0);
        $activity = $this->getClass($ability, 0, 100);

        $result = $activity();

        $this->assertInstanceOf(Money::class, $result);
    }

    public function testActivityRunsOnSuccessMethod() {
        $ability = new Ability('strength', 100);

        $activity = $this->getClass($ability, 0, 100);

        $activity->do();
        $this->assertTrue($activity->ranSuccess);
    }

    public function testActivityRunsOnFailureMethod() {
        $ability = new Ability('strength', 0);

        $activity = $this->getClass($ability, 100, 100);

        $activity->do();
        $this->assertTrue($activity->ranFailure);
    }
}
