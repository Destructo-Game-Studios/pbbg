<?php

namespace DestructoTest\Examples;

use DestructoExamples\Character;
use DestructoTest\TestCase;

class CharacterTest extends TestCase {

    public function testCharacterHasHealth() {
        $character = new Character();
        $this->assertUsesTrait('HasWallet', $character);
    }
}