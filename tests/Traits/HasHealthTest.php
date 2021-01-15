<?php

namespace DestructoTest\Traits;

use Destructo\Traits\HasHealth;

use DestructoTest\TestCase;

class HasHealthTest extends TestCase {
    public function setUp() : void {
        parent::setUp();

        $this->character = new class {
            use HasHealth;

            public function __construct() {
                $this->initializeHealth(100, 100);
            }
        };
    }

    public function testIsRecognizableAsATrait() {
        $this->assertUsesTrait('HasHealth', $this->character);
    }

    public function testIsImplementedOnConstruction() {
        $this->assertEquals(100, $this->character->currentHealth());
        $this->assertEquals(100, $this->character->maxHealth());
        $this->assertEquals(100, $this->character->healthPercent());
    }

    public function testTakesDamage() {
        $this->character->damage(10);
        $this->assertEquals(90, $this->character->currentHealth());
    }

    public function testHealsIfPassedANegativeToDamage() {
        $this->character->damage(10);
        $this->character->damage(-10);
        $this->assertEquals(100, $this->character->currentHealth());
    }

    public function testHealsDamage() {
        $this->character->damage(10);
        $this->character->heal(10);
        $this->assertEquals(100, $this->character->currentHealth());
    }

    public function testTakesDamageIfPassedANegativeToHeal() {
        $this->character->heal(-10);
        $this->assertEquals(90, $this->character->currentHealth());
    }

    public function testReturnsAliveIfHealthAboveZero() {
        $this->assertFalse($this->character->isDead());
    }

    public function testReturnsDeadIfHealthZeroOrBelow() {
        $this->character->damage(100);
        $this->assertTrue($this->character->isDead());
    }

    public function testMaxHealthCanBePermanentlyIncreased() {
        $this->character->increaseMaxHealth(100);
        $this->assertEquals(200, $this->character->maxHealth());
    }

    public function testHealReturnsSelf() {
        $this->assertUsesTrait('Destructo\Traits\HasHealth', $this->character->heal(10));
    }
}
