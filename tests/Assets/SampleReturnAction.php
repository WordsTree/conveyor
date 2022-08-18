<?php

namespace Tests\Assets;

use Exception;
use InvalidArgumentException;
use stdClass;
use Conveyor\Actions\Abstractions\AbstractAction;

class SampleReturnAction extends  AbstractAction
{
    const ACTION_NAME = 'sample-return-action';

    protected string $name = self::ACTION_NAME;
    protected int $fd;

    /**
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function execute(array $data): mixed
    {
        $this->send('message-back', $this->fd);
        return true;
    }

    /**
     * @param array $data
     * @return void
     *
     * @throws InvalidArgumentException
     */
    public function validateData(array $data) : void
    {
        if (!isset($data['action'])) {
            throw new InvalidArgumentException('SampleAction required \'action\' field to be created!');
        }
    }

    /**
     * @return int $fd
     *
     * @return void
     */
    public function setFd(int $fd): void
    {
        $this->fd = $fd;
    }

    /**
     * @return int
     */
    public function getFd(): int
    {
        return $this->fd;
    }

    /**
     * @return mixed $server
     *
     * @return void
     */
    public function setServer($server): void
    {
        $this->server = $server;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }
}