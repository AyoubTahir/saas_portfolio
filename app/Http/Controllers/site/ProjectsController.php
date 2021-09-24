<?php

namespace App\Http\Controllers\site;

use App\Models\User;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProjectsController extends Controller
{
    public function index($username)
    {
        $user = User::where('name', str_replace('-', ' ', $username))
            ->with(
                'categories.projects.images',
                'settings',
            )->firstOrFail();

        if (!$user->categories && !$user->settings) {
            return abort(404);
        }

        Project::where('user_id', $user->id)->firstOrFail();

        $currentLang = Session::get('currentLang');

        $lang = $currentLang ? $currentLang : 'en';

        $randImage = $this->getRandomProjectImage($user);

        return view('site.projects.index', compact(['user', 'randImage', 'lang']));
    }

    public function show($username, $id)
    {
        $user =  User::where('name', str_replace('-', ' ', $username))->firstOrFail();

        $project = Project::where('user_id', $user->id)->where('id', $id)->with('category', 'images')->firstOrFail();

        $currentLang = Session::get('currentLang');

        $lang = $currentLang ? $currentLang : 'en';

        return view('site.projects.show', compact(['project', 'lang', 'user']));
    }

    public function getRandomProjectImage($user)
    {
        $category =  $user->categories->random();

        if (isset($category->projects) && count($category->projects) > 0) {

            $project = $category->projects->random();

            if (isset($project->images) && count($project->images) > 0) {

                $rand = rand(0, 1);

                if ($rand == 0) {
                    return $project->images->random()->image;
                }

                return $project->thumbnail;
            }

            return $project->thumbnail;
        }

        return $this->getRandomProjectImage($user);
    }
}
