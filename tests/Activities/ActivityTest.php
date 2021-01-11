<?php

namespace DestructoTest\Activities;

use Destructo\Activity;
use Destructo\Money;

class ActivityTest extends \PHPUnit\Framework\TestCase {
    public function testActivityReturnsMoneyObject() {
        $activity = new Activity();
        $result = $activity->do();

        $this->assertInstanceOf(Money::class, $result);
    }
    
}