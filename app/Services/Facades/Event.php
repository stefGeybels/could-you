<?php

namespace App\Services\Facades;

class Event
{

    protected static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic($method, $arguments)
    {
        return (self::resolveFacade('Event'))->$method(...$arguments);
    }
}