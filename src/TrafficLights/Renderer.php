<?php

namespace TrafficLights;

interface Renderer {
    public function render(StateMachine $state);
}