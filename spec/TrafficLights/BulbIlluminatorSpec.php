<?php

namespace spec\TrafficLights;

use TrafficLights\BulbIlluminator;
use TrafficLights\Renderer;
use TrafficLights\StateMachine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BulbIlluminatorSpec extends ObjectBehavior
{
    function it_is_a_renderer()
    {
        $this->shouldImplement(Renderer::class);
    }

    function it_can_render_the_stop_state_bulbs()
    {
        $state = new StateMachine();
        $this->render($state)->shouldReturn('R--');
    }

    function it_can_render_the_prepare_to_go_state_bulbs()
    {
        $state = new StateMachine();
        $state->advance();
        $this->render($state)->shouldReturn('RA-');
    }

    function it_can_render_the_go_state_bulbs()
    {
        $state = new StateMachine();
        $state->advance();
        $state->advance();
        $this->render($state)->shouldReturn('--G');
    }

    function it_can_render_the_prepare_to_stop_state_bulbs()
    {
        $state = new StateMachine();
        $state->advance();
        $state->advance();
        $state->advance();
        $this->render($state)->shouldReturn('-A-');
    }
}
