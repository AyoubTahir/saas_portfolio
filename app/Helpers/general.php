<?php

use  App\Helpers\Messages;

if (!function_exists('MsgCount')) {
    function MsgCount()
    {
        return Messages::newMessages();
    }
}
