<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Services\Perform;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;

class AboutSectionController extends Controller
{
    public function aboutSection()
    {
        $about = Perform::index(About::class);

        return view('admin.homepage.about', compact(['about']));
    }

    public function updateAboutSection(AboutRequest $request)
    {
        Perform::update(About::class, $request);

        return redirect()->route('home.about')->with(['success' => 'changed updated successfully']);
    }
}
