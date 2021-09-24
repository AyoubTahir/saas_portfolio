<?php

namespace App\Helpers;

use App\Models\Message;
use App\Services\Perform;

class Messages
{
    private static $newMessages;
    private static $lastMessages;

    public static function newMessages()
    {
        if (is_null(self::$newMessages)) {
            self::$newMessages = Perform::index(Message::class, null, true)->where('important', 0)->where('readed', 0)->count();
        }

        return self::$newMessages;
    }

    public static function lastMessages()
    {
        if (is_null(self::$lastMessages)) {
            self::$lastMessages = Perform::index(Message::class, null, true)->where('important', 0)->where('readed', 0)->take(3);
        }

        return self::$lastMessages;
    }
}
