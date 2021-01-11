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
        $this->expectExceptionMessage('Destructo\Money');

        $money = new Money(1000);        
        $money->amount = 10000;
    }

    public function testIncreasingMoneyReturnsNewInstanceOfMoney() {
        $money1 = new Money(100);

        $money3 = $money1->increase(33);

        $this->assertEquals(133, $money3->amount);
        $this->assertFalse($money1 === $money3);
    }
}