<?php

namespace DestructoTest\Examples;

use DestructoExamples\Character;
use DestructoTest\TestCase;

class CharacterTest extends TestCase {
    public function testCharacterHasHealth() {
        $character = new Character();
        $this->assertUsesTrait('HasHealth', $character);
    }

    public function testCharacterHasWallet() {
        $character = new Character();
        $this->assertUsesTrait('HasWallet', $character);
    }

    public function testCharacterHasTraits() {
        $character = new Character();
        $this->assertUsesTraits(['HassHealth','HasWallet'], $character);
    }
}
