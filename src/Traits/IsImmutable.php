<?php

namespace Destructo\Traits;

use Destructo\Exception\ImmutabilityException;

trait IsImmutable {

    /**
     * @param mixed $value
     */
    public function __set(string $attribute, $value) : void {
        $className = self::class;
        throw new ImmutabilityException("Attempt to set protected attribute $className::$attribute to $value");
    }

    public function __get(string $attribute) : int {
        /** @var int */
        return $this->$attribute;
    }
}
