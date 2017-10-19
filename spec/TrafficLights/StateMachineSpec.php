<?php

namespace spec\TrafficLights;

use TrafficLights\StateMachine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StateMachineSpec extends ObjectBehavior
{
    function it_has_an_initial_state_of_stop()
    {
        $this->__toString()->shouldBe('stop');
    }

    function it_moves_to_prepare_to_go_after_stop()
    {
        $this
            ->advance()
            ->__toString()
            ->shouldBe('prepare to go');
    }

    function it_moves_to_go_after_prepare_to_go()
    {
        $this
            ->advance()
            ->advance()
            ->__toString()
            ->shouldBe('go');
    }

    function it_moves_to_prepare_to_stop_after_go()
    {
        $this
            ->advance()
            ->advance()
            ->advance()
            ->__toString()
            ->shouldBe('prepare to stop');
    }

    function it_moves_to_stop_after_prepare_to_stop()
    {
        $this
            ->advance()
            ->advance()
            ->advance()
            ->advance()
            ->__toString()
            ->shouldBe('stop');
    }

    function it_can_represent_each_state_as_a_letter_of_illuminated_bulbs()
    {
        $this
            ->bulbs()->shouldBe('R');
    }

    function it_can_be_rendered_as_ascii()
    {
        $this->render()->shouldReturn('
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
');
    }
}
