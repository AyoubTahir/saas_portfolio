<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;

class AboutSectionController extends Controller
{
    public function aboutSection()
    {
        $about = About::where('user_id', Auth::id())->first();

        return view('admin.homepage.about', compact(['about']));
    }

    public function updateAboutSection(AboutRequest $request)
    {

        $currentUserAbout =  About::where('user_id', Auth::id())->first();

        $request['user_id'] = Auth::id();

        $data = $request->only($this->aboutFields());

        if ($currentUserAbout) {
            (new SaveModel($currentUserAbout, $data))->execute();
        } else {
            (new SaveModel(new About(), $data))->execute();
        }

        return redirect()->route('home.about')->with(['success' => 'changed updated successfully']);
    }

    private function aboutFields()
    {
        return [
            'user_id',
            'full_name_ar',
            'full_name_en',
            'sub_title_ar',
            'sub_title_en',
            'job_ar',
            'job_en',
            'description_ar',
            'description_en',
            'button_ar',
            'button_en',
            'image',
            'status'
        ];
    }
}
