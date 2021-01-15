<?php

namespace DestructoTest\Abilities;

use Destructo\Abilities;
use Destructo\Abilities\Ability;

use DestructoTest\TestCase;

class AbilitiesTest extends TestCase {
    public function testAbilitiesDefaults() {
        $abilities = new Abilities([]);
        $defaults = [
            'strength' => 1,
            'dexterity' => 1,
            'constitution' => 1,
            'intelligence' => 1,
            'wisdom' => 1,
            'charisma' => 1,
        ];

        $actual = array_map(function ($ability) {
            return $ability->amount;
        }, $abilities->all());

        $this->assertEquals($defaults, $actual);
    }

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

    public function testAbilitiesIsExtendableWithoutBreaking() {
        $class = new class extends Abilities {
            public function __construct() {
                parent::__construct([]);
            }

            public function getTestData() {
                $this->abilities = $this->_setAbilities(['dexterity'=>999]);
                $this->abilities['strength'] = 'success';
                return $this->abilities;
            }
        };

        $this->assertEquals('success', $class->getTestData()['strength']);
        $this->assertEquals(999, $class->dexterity);
        $this->assertIsArray( $class->all() );
    }
}
