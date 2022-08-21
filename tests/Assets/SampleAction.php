<?php

namespace Tests\Assets;

use Exception;
use InvalidArgumentException;
use stdClass;
use Conveyor\Actions\Abstractions\AbstractAction;

class SampleAction extends  AbstractAction
{
    const ACTION_NAME = 'sample-action';

    protected string $name = self::ACTION_NAME;
    protected int $fd;

    /**
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function execute(array $data): mixed
    {
        $this->send(json_encode($data), $this->fd);
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
}