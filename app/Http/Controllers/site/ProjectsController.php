<?php

namespace App\Http\Controllers\site;

use App\Models\User;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProjectsController extends Controller
{
    public function show($username, $id)
    {
        $user =  User::where('name', str_replace('-', ' ', $username))->firstOrFail();

        $project = Project::where('user_id', $user->id)->where('id', $id)->with('category', 'images')->firstOrFail();

        $currentLang = Session::get('currentLang');

        $lang = $currentLang ? $currentLang : 'en';

        return view('site.projects.show', compact(['project', 'lang', 'user']));
    }
}
