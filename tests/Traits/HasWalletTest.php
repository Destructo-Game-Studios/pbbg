<?php

namespace DestructoTest\Traits;

use Destructo\Traits\HasWallet;
use DestructoTest\TestCase;

class HasWalletTest extends TestCase {
    public function setUp() : void {
        parent::setUp();

        $this->character = new class {
            use HasWallet;

            public function __construct() {
                $this->initWallet(100);
            }

            public function getWallet() {
                return $this->wallet;
            }
        };
    }
    public function testCharacterHasWallet() {
        $this->assertUsesTrait('Destructo\Traits\HasWallet', $this->character);
    }

    public function testCharacterWalletCanBeInitialized() {
        $this->assertEquals(100, $this->character->getWallet()->amount);
    }

    public function testCharacterWalletDefaults() {
        $char = new class {
            use HasWallet;

            public function __construct() {
                $this->initWallet();
            }

            public function getWallet() {
                return $this->wallet;
            }
        };
        $this->assertEquals(0, $char->getWallet()->amount);
    }
}
