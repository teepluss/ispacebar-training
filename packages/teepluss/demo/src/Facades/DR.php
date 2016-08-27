<?php

namespace Teepluss\Demo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Illuminate\Filesystem\Filesystem
 */
class DR extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'DR';
    }
}
