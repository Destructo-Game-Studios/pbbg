<?php

namespace DestructoTest\Characters;

use Destructo\Abilities;
use Destructo\Character;
use Destructo\Money;

class CharacterTest extends \PHPUnit\Framework\TestCase {
    public function testCharacterNameSetsCorrectly() {
        $money = new Money(0);
        $abilities = new Abilities([]);
        $character = new Character('test', $money, $abilities);

        $this->assertEquals('test', $character->name);
    }

    public function testCharacterHasMoney() {
        $money = new Money(100);
        $abilities = new Abilities([]);
        $character = new Character('test', $money, $abilities);
        $this->assertInstanceOf(Money::class, $character->wallet);
        $this->assertEquals(100, $character->wallet->amount);
    }

    public function testCharacterTakesAbilitiesClassOnConstruction() {
        $money = new Money(0);
        $abilities = new Abilities([]);
        $character = new Character('test', $money, $abilities);

        $this->assertInstanceOf(Character::class, $character);
    }

    public function testAbleToAccessCharacterAbilitiesWithoutAccessingAbilitiesClassDirectly() {
        $money = new Money(100);
        $abilities = new Abilities(['strength' => 100]);
        $character = new Character('test', $money, $abilities);
        
        $this->assertEquals(100, $character->strength);
    }
}
