<?php

namespace App\Http\Controllers\site;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index($username)
    {

        $user = User::where('name', str_replace('-', ' ', $username))->firstOrFail();

        $currentLang = Session::get('currentLang');

        $lang = $currentLang ? $currentLang : 'en';

        if ($user->is_admin) {
            //return response()->view('errors.404', [], 404);
            return abort(404);
        }

        if (!Cookie::get('portfolio_display')) {

            Cookie::queue('portfolio_display', '1', 60);

            $user->portfolio->incrementViewsCount();
        }

        return view('site.home.index', compact(['user', 'lang']));
    }

    /*
    ->with(
                'hero',
                'about',
                'interest.interestField',
                'fact.factsField',
                'service.servicesField',
                'resume.resumesField',
                'portfolio',
                'categories.projects.images',
                'clients',
                'contact',
                'settings',
            )
    */
}
