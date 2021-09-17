<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang()
    {
        if (session::has('currentLang') && session::get('currentLang') == 'en') {
            Session::put('currentLang', 'ar');
        } else {
            Session::put('currentLang', 'en');
        }

        return redirect()->back();
    }
}
