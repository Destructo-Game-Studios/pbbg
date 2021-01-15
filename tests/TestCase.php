<?php

namespace DestructoTest;

class TestCase extends \PHPUnit\Framework\TestCase {
    public function setUp() : void {
        srand(1);
    }

    protected function assertUsesTrait(string $traitName, $class) {
        $traits = \class_uses($this->character);
        $this->assertContains($traitName, $traits);
    }
}
