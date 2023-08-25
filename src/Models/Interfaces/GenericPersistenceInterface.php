<?php

namespace Conveyor\Models\Interfaces;

interface GenericPersistenceInterface
{
    /**
     * Truncate the data storage.
     *
     * @param bool $fresh
     * @return static
     */
    public function refresh(bool $fresh = false): static;
}
