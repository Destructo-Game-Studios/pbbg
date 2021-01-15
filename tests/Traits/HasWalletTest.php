<?php

namespace DestructoTest\Traits;

use Destructo\Traits\HasWallet;
use DestructoTest\TestCase;

class HasWalletTest extends TestCase {
    public function setUp() : void {
        parent::setUp();

        $this->character = new class {
            use HasWallet;
        };
    }
    public function testCharacterHasWallet() {
        $this->assertUsesTrait('Destructo\Traits\HasWallet', $this->character);
    }
}
