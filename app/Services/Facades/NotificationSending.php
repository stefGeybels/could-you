<?php

namespace App\Services\Facades;

class NotificationSending
{

    protected static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic($method, $arguments)
    {
        return (self::resolveFacade('Notification'))->$method(...$arguments);
    }
}