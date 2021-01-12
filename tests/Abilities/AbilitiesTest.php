<?php

namespace DestructoTest\Abilities;

use Destructo\Abilities;
use Destructo\Abilities\Ability;
use Destructo\Character;
use Destructo\Money;

class AbilitiesTest extends \PHPUnit\Framework\TestCase {

    public function testAbilitiesReturnsValueOfAbility() {
        $abilities = new Abilities([
            'strength' => 10,
            'dexterity' => 10,
            'constitution' => 10,
            'intelligence' => 10,
            'wisdom' => 10,
            'charisma' => 10,
        ]);

        $this->assertInstanceOf(Abilities::class, $abilities);
        $this->assertEquals(10, $abilities->strength);
    }

    public function testAllAbilitiesExistAfterConstruction() {
        $abilities = new Abilities([
            'dexterity' => 10,
            'constitution' => 10,
            'intelligence' => 10,
            'wisdom' => 10,
            'charisma' => 10,
        ]);

        $this->assertGreaterThan(0, $abilities->strength);
        $this->assertEquals(10, $abilities->charisma);
    }

    public function testAbilitesAreInstancesOfAbility() {
        $abilities = new Abilities([
            'dexterity' => 10,
            'constitution' => 10,
            'intelligence' => 10,
            'wisdom' => 10,
            'charisma' => 10,
        ]);

        $strength = $abilities->strength();

        $this->assertInstanceOf(Ability::class, $strength);
    }

}