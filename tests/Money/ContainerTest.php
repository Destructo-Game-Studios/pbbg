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

        $money2 = $money1->increase(33);

        $this->assertEquals(133, $money2->amount);
        $this->assertFalse($money1 === $money2);
    }

    public function testIncreasingMoneyWithNegativeValueWorksCorrectly() {
        $money1 = new Money(100);
        $money2 = $money1->increase(-33);
        
        $this->assertEquals(67, $money2->amount);
        $this->assertFalse($money1 === $money2);
    }

    public function testDecreaseMethodWorksCorrectly() {
        $money1 = new Money(100);
        $money2 = $money1->decrease(33);
        
        $this->assertEquals(67, $money2->amount);
        $this->assertFalse($money1 === $money2);    
    }

    public function testMoneyIsSerializable() {
        $money = new Money(1000);

        $serial = serialize($money);

        $newMoney = unserialize($serial);

        $this->assertEquals(1000, $newMoney->amount);
    }

    public function testMoneyExposesAtLeastMethod() {
        $money = new Money(1000);

        $this->assertTrue($money->atLeast(100));
    }

    public function testMoneyExposesUnderMethod() {
        $money = new Money(1000);

        $this->assertTrue($money->under(1001));    
    }
}