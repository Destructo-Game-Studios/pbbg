<?php

namespace DestructoTest\Money;

use Destructo\Exception\ImmutabilityException;
use Destructo\Money;

class ContainerTest extends \PHPUnit\Framework\TestCase {

    public function testAmountIsAccessibleOnceSet() {
        $money = new Money(1000);

        $this->assertEquals(1000, $money->amount);
    }

    public function testAmountIsImmutable() {
        $this->expectException(ImmutabilityException::class);

        $money = new Money(1000);        
        $money->amount = 10000;
    }

}