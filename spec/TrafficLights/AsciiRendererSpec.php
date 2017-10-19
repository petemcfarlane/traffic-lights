<?php

namespace spec\TrafficLights;

use TrafficLights\AsciiRenderer;
use TrafficLights\Renderer;
use TrafficLights\StateMachine;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AsciiRendererSpec extends ObjectBehavior
{
    function it_is_a_renderer()
    {
        $this->shouldImplement(Renderer::class);
    }

    function it_can_render_the_stop_state_in_ascii()
    {
        $state = new StateMachine();
        $this->render($state)->shouldReturn('
.------------.
|    .==.    |
|   /RRRR\   |
|   \RRRR/   |
|    `==`    |
|    .==.    |
|   /    \   |
|   \    /   |
|    `==`    |
|    .==.    |
|   /    \   |
|   \    /   |
|    `==`    |
|--._.--._.--|
    [____]
     [##]
');
    }

    function it_can_render_the_prepare_to_go_state_in_ascii()
    {
        $state = new StateMachine();
        $state->advance();
        $this->render($state)->shouldReturn('
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
|   /    \   |
|   \    /   |
|    `==`    |
|--._.--._.--|
    [____]
     [##]
');
    }

    function it_can_render_the_go_state_in_ascii()
    {
        $state = new StateMachine();
        $state->advance();
        $state->advance();
        $this->render($state)->shouldReturn('
.------------.
|    .==.    |
|   /    \   |
|   \    /   |
|    `==`    |
|    .==.    |
|   /    \   |
|   \    /   |
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

    function it_can_render_the_prepare_to_stop_state_in_ascii()
    {
        $state = new StateMachine();
        $state->advance();
        $state->advance();
        $state->advance();
        $this->render($state)->shouldReturn('
.------------.
|    .==.    |
|   /    \   |
|   \    /   |
|    `==`    |
|    .==.    |
|   /::::\   |
|   \::::/   |
|    `==`    |
|    .==.    |
|   /    \   |
|   \    /   |
|    `==`    |
|--._.--._.--|
    [____]
     [##]
');
            }
}
