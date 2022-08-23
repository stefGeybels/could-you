<?php

namespace App\Services\Facades;

class FriendSettings
{

    protected static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic($method, $arguments)
    {
        return (self::resolveFacade('Friend'))->$method(...$arguments);
    }
}