<?php

use App\Models\Setting;
use  App\Helpers\Messages;
use Illuminate\Support\Facades\Auth;

if (!function_exists('MsgCount')) {
    function MsgCount()
    {
        return Messages::newMessages();
    }
}
if (!function_exists('lastMsgs')) {
    function lastMsgs()
    {
        return Messages::lastMessages();
    }
}

if (!function_exists('logo')) {
    function logo($name = false)
    {
        //$name = null
        if (Auth::user()) {
            $setting = Setting::where('user_id', Auth::user()->id)->first();
        }


        if ($name) {
            return $setting && $setting->website_name_en ? $setting->website_name_en : 'Tahir';
        }
        return $setting && $setting->light_logo_en ? asset('uploads/' . $setting->light_logo_en) : '';
    }
}
