<?php

namespace DestructoTest\Abilities;

use Destructo\Abilities\Ability;

use DestructoTest\TestCase;

class AbilityTest extends TestCase {
    public function testStrengthCheckSucceedsWithMaxedStats() {
        $ability = new Ability('strength', 20);

        $this->assertTrue( $ability->abilityCheck( 20 ) );
    }

    public function testStrengthCheckFailsWithZeroedStats() {
        $ability = new Ability('strength', 1);

        $this->assertFalse( $ability->abilityCheck( 100 ) );
    }

    public function testAbilityCheckWithinCorrectRange() {
        $ability = new Ability('strength', 0);

        $this->assertFalse( $ability->abilityCheck(6) );
    }
}
