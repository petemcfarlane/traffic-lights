<?php

namespace TrafficLights;

class BulbIlluminator implements Renderer
{
    public function render(StateMachine $state)
    {
        switch ($state) {
            case 'stop':
                return 'R--';

            case 'prepare to go':
                return 'RA-';

            case 'go':
                return '--G';

            case 'prepare to stop':
                return '-A-';
        }
    }
}
