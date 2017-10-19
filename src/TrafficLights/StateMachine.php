<?php

namespace TrafficLights;

class StateMachine
{
    const STOP = 0;
    const PREPARE_TO_GO = 1;
    const GO = 3;
    const PREPARE_TO_STOP = 4;

    private $readableStates = ['stop', 'prepare to go', 'go', 'prepare to stop'];

    private $state = StateMachine::STOP;

    public function __toString()
    {
        return $this->readableStates[$this->state];
    }

    public function advance()
    {
        $this->state = ($this->state + 1) % 4;

        return $this;
    }

    public function render()
    {
        return '
.------------.
|    .==.    |
|   /RRRR\   |
|   \RRRR/   |
|    `==`    |
|    .==.    |
|   /::::\   |
|   \::::/   |
|    `==`    |
|    .==.    |
|   /&&&&\   |
|   \&&&&/   |
|    `==`    |
|--._.--._.--|
    [____]
     [##]
';
    }

    public function bulbs()
    {
        return 'R';
    }
}
