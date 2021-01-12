<?php

namespace DestructoTest\Abilities;

use Destructo\Abilities;
use Destructo\Abilities\Ability;
use Destructo\Character;
use Destructo\Money;

class AbilityTest extends \PHPUnit\Framework\TestCase {

    public function testStrengthCheckSucceedsWithMaxedStats() {

        $ability = new Ability('strength', 20);

        $this->assertTrue( $ability->abilityCheck( 0 ) );

    }

    public function testStrengthCheckFailsWithZeroedStats() {

        $ability = new Ability('strength', 1);

        $this->assertFalse( $ability->abilityCheck( 100 ) );

    }



}