<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hero;
use App\Services\Perform;
use App\Http\Requests\HeroRequest;
use App\Http\Controllers\Controller;

class HeroSectionController extends Controller
{
    public function heroSection()
    {
        $hero = Perform::index(Hero::class);

        return view('admin.homepage.hero', compact(['hero']));
    }

    public function updateHeroSection(HeroRequest $request)
    {
        Perform::update(Hero::class, $request);

        return redirect()->route('home.hero')->with(['success' => 'changed updated successfully']);
    }
}
