<?php

namespace App\Http\Controllers\admin;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Requests\HeroRequest;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;

class HeroSectionController extends Controller
{
    public function heroSection()
    {
        $hero = Hero::where('user_id', Auth::id())->first();

        return view('admin.homepage.hero', compact(['hero']));
    }

    public function updateHeroSection(HeroRequest $request)
    {
        $currentUserHero =  Hero::where('user_id', Auth::id())->first();

        $request['user_id'] = Auth::id();

        $data = array_filter($request->only($this->heroFields()));

        if ($currentUserHero) {
            (new SaveModel($currentUserHero, $data))->execute();
        } else {
            (new SaveModel(new Hero(), $data))->execute();
        }

        return redirect()->route('home.hero')->with(['success' => 'changed updated successfully']);
    }

    private function heroFields()
    {
        return [
            'user_id',
            'title_ar',
            'title_en',
            'job_ar',
            'job_en',
            'description_ar',
            'description_en',
            'button_ar',
            'button_en',
            'cover',
            'image'
        ];
    }
}
