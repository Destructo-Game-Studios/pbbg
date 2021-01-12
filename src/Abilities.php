<?php

namespace Destructo;

use Destructo\Abilities\Ability;

class Abilities {

    protected array $abilities;

    public function __construct( array $abilities ) {

        $this->abilities = $this->_setAbilities( $abilities );

    }

    /** @param string $argument */
    public function __get($argument) : int{

        /**
         * @var int $this->abilities[$argument]->amount
         */
        return $this->abilities[$argument]->amount;

    }

    /**
     * @param string $method
     * @param mixed $arguments
     */
    public function __call($method, $arguments) {

        return $this->abilities[$method];
    
    }

    protected function _setAbilities( array $abilities ) : array {
        $defaults = [
            'strength' => 1,
            'dexterity' => 1,
            'constitution' => 1,
            'intelligence' => 1,
            'wisdom' => 1,
            'charisma' => 1,
        ];

        $values = array_merge( $defaults, $abilities );

        $compiledAbilities = [];

        /** 
         * @var string $name
         * @var int $amount 
         */
        foreach($values as $name => $amount){
            $compiledAbilities[ $name ] = new Ability($name, $amount);
        }

        return $compiledAbilities;

    }

}