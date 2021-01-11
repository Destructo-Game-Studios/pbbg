<?php

namespace Destructo;

use Destructo\Money;

class Activity {
    public function do() : Money {
        return new Money(100);
    }
}