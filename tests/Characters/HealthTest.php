<?php

namespace DestructoTest\Characters;

use Destructo\Traits\HasHealth;
use DestructoTest\TestCase;

class HealthTest extends TestCase {
    public function setUp() : void {
        parent::setUp();

        $this->character = new class {
            use HasHealth;

            public function __construct() {
                $this->initializeHealth(100, 100);
            }
        };
    }

    public function testHasHealthIsRecognizableAsATrait() {
        $traits = \class_uses($this->character);
        
        $this->assertContains('Destructo\Traits\HasHealth', $traits);
    }

    public function testHasHealthIsImplementedOnConstruction() {
        $this->assertEquals(100, $this->character->currentHealth());
        $this->assertEquals(100, $this->character->maxHealth());
        $this->assertEquals(100, $this->character->healthPercent());
    }

    public function testHasHealthTakesDamage() {
        $this->character->damage(10);
        $this->assertEquals(90, $this->character->currentHealth());
    }

    public function testHasHealthHealsIfPassedANegativeToDamage() {
        $this->character->damage(10);
        $this->character->damage(-10);
        $this->assertEquals(100, $this->character->currentHealth());
    }

    public function testHasHealthHealsDamage() {
        $this->character->damage(10);
        $this->character->heal(10);
        $this->assertEquals(100, $this->character->currentHealth());
    }

    public function testHasHealthTakesDamageIfPassedANegativeToHeal() {
        $this->character->heal(-10);
        $this->assertEquals(90, $this->character->currentHealth());
    }

    public function testHasHealthReturnsAliveIfHealthAboveZero() {
        $this->assertFalse($this->character->isDead());
    }

    public function testHasHealthReturnsDeadIfHealthZeroOrBelow() {
        $this->character->damage(100);
        $this->assertTrue($this->character->isDead());
    }
}
