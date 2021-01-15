<?php

namespace DestructoTest;

class TestCase extends \PHPUnit\Framework\TestCase {
    public function setUp() : void {
        srand(1);
    }

    protected function assertUsesTrait(string $traitName, $class) {
        $traits = \class_uses($class);
        \array_filter($traits, function($actualTraitName) use ($traitName){
            return strpos($actualTraitName, $traitName) !== false;
        });
        $this->assertTrue(count($traits) > 0);
    }
}
