<?php

namespace App\Http\Controllers\site;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index($username)
    {
        $user = User::where('name', str_replace('-', ' ', $username))
            ->with(
                'hero',
                'about',
                'interest.interestField',
                'fact.factsField',
                'service.servicesField',
                'resume.resumesField',
                'portfolio',
                'categories.projects.images',
                'contact',
                'settings',
            )->firstOrFail();

        $currentLang = Session::get('currentLang');

        $lang = $currentLang ? $currentLang : 'en';

        return view('site.home.index', compact(['user', 'lang']));
    }
}
