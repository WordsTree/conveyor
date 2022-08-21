<?php

namespace Tests;

use Conveyor\Actions\BroadcastAction;

class SocketChannelTest extends SocketHandlerTestCase
{
    public function testCanExecuteChannelConnectAction()
    {
        $channelName = 'test-channel';

        $this->connectToChannel(1, $channelName);

        $this->assertCount(1, $this->channelPersistence->getAllConnections());
        $this->assertTrue(in_array($channelName, $this->channelPersistence->getAllConnections()));
    }

    public function testCanBroadcastToChannel()
    {
        $message = 'sample-message';
        $channelName = 'test-channel';

        $this->server->connections[] = 3;

        $this->sendData(3, json_encode([
            'action' => BroadcastAction::ACTION_NAME,
            'data' => $message,
        ]));

        $this->assertTrue(!in_array(1, array_keys($this->userKeys)));
        $this->assertTrue(!in_array(2, array_keys($this->userKeys)));
        $this->assertTrue(!in_array(3, array_keys($this->userKeys)));

        $this->connectToChannel(1, $channelName);
        $this->connectToChannel(2, $channelName);
        $this->connectToChannel(3, $channelName);

        // test broadcast

        $this->sendData(1, json_encode([
            'action' => BroadcastAction::ACTION_NAME,
            'data' => $message,
        ]));

        $this->assertTrue(!in_array(1, array_keys($this->userKeys)));
        $this->assertTrue(in_array(2, array_keys($this->userKeys)));
        $this->assertTrue(in_array(3, array_keys($this->userKeys)));
        $this->assertCount(2, array_filter(
            $this->userKeys,
            fn($d) => $message === json_decode($d)->data,
        ));
    }
}
