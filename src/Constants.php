<?php

namespace Conveyor;

use Conveyor\Traits\Constants\ActionEvents;
use Conveyor\Traits\Constants\Events;
use Conveyor\Traits\Constants\Filters;
use Conveyor\Traits\Constants\Options;
use Conveyor\Traits\Constants\HasReactiveActions;
use Conveyor\Traits\Constants\Persistence;
use Conveyor\Traits\Constants\SubProtocols;

class Constants
{
    use Options;
    use Filters;
    use Events;
    use ActionEvents;
    use HasReactiveActions;
    use SubProtocols;
    use Persistence;

    /**
     * Description: Default options for Conveyor.
     * @var array<array-key, mixed>
     */
    public const DEFAULT_OPTIONS = [
        self::WEBSOCKET_SUBPROTOCOL => self::SOCKET_CONVEYOR,
        self::TRACK_PROFILE => false,
        self::USE_PRESENCE => false,
        self::USE_ACKNOWLEDGMENT => false,
        self::ACKNOWLEDGMENT_ATTEMPTS => 3,
        self::ACKNOWLEDGMENT_TIMOUT => 0.5,
        self::WEBSOCKET_AUTH_URL => null,
        self::WEBSOCKET_AUTH_TOKEN => null,
    ];
}
