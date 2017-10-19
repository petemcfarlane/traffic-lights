<?php

require __DIR__ . '/vendor/autoload.php';

use Amp\Loop;

Loop::run(function () {
    $trafficLights = new TrafficLights\StateMachine;
    $renderer = new TrafficLights\AsciiRenderer;

    $advanceAndRenderTrafficLights = function () use ($trafficLights, $renderer) {
        $trafficLights->advance();
        print $renderer->render($trafficLights);
    };

    Loop::repeat(1000, $advanceAndRenderTrafficLights);
});
