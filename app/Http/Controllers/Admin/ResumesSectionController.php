<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resume;
use App\Models\ResumeField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResumesRequest;
use App\Http\Requests\ResumesFieldsRequest;

class ResumesSectionController extends Controller
{
    public function resumesSection()
    {
        $resume = Resume::where('user_id', Auth::id())->with('resumesField')->first();

        return view('admin.homepage.resume', compact(['resume']));
    }

    public function updateResumesSection(ResumesRequest $request)
    {
        $currentUserResumes =  Resume::where('user_id', Auth::id())->first();

        $request['user_id'] = Auth::id();

        $data = $request->only($this->resumesFields());

        if ($currentUserResumes) {
            (new SaveModel($currentUserResumes, $data))->execute();
        } else {
            (new SaveModel(new Resume(), $data))->execute();
        }

        return redirect()->route('home.resumes')->with(['success' => 'changed updated successfully']);
    }

    public function storeResumes(ResumesFieldsRequest $request)
    {
        $currentUserResumes =  Resume::where('user_id', Auth::id())->first();

        if ($currentUserResumes) {
            $request['resume_id'] = $currentUserResumes->id;
            $request['icon'] = 'fffff';

            $data = $request->only($this->resumesFieldFields());

            (new SaveModel(new ResumeField(), $data))->execute();
        }

        return redirect()->route('home.resumes')->with(['success' => 'changed updated successfully']);
    }

    public function editResumes($id)
    {
        $resumesField = ResumeField::findorfail($id);

        return redirect()->route('home.resumes')->with(['success' => 'resumes Field has been updated.']);
    }

    public function deleteResumes($id)
    {
        $resumesField = ResumeField::findorfail($id);

        $resumesField->delete();

        return redirect()->route('home.resumes')->with(['success' => 'resumes Field has been deleted.']);
    }

    public function destroyResumes(Request $request)
    {
        ResumeField::destroy($request->ids);

        return redirect()->route('home.resumes')->with(['success' => 'resumes Fields has been deleted.']);
    }

    private function resumesFields()
    {
        return [
            'user_id',
            'title_ar',
            'title_en',
            'description_ar',
            'description_en',
            'status'
        ];
    }

    private function resumesFieldFields()
    {
        return [
            'resume_id',
            'name_ar',
            'name_en',
            'job_ar',
            'job_en',
            'desc_ar',
            'desc_en',
            'date_from',
            'date_to',
            'icon'
        ];
    }
}
