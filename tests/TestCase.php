<?php

namespace DestructoTest;

class TestCase extends \PHPUnit\Framework\TestCase {
    public function setUp() : void {
        srand(1);
    }

    protected function assertUsesTrait(string $traitName, $class) {
        $traits = \class_uses($class);
        $traits = \array_filter($traits, function ($actualTraitName) use ($traitName) {
            return strpos($actualTraitName, $traitName) !== false;
        });
        
        $this->assertTrue(count($traits) > 0);
    }

    protected function assertUsesTraits(array $traits, $class) {
        foreach ($traits as $traitName) {
            $this->assertUsesTrait($traitName, $class);
        }
    }
}
