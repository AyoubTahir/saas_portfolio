<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resume;
use App\Services\Perform;
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
        $resume = Perform::index(Resume::class, 'resumesField');

        return view('admin.homepage.resume', compact(['resume']));
    }

    public function updateResumesSection(ResumesRequest $request)
    {
        Perform::update(Resume::class, $request);

        return redirect()->route('home.resumes')->with(['success' => 'changed updated successfully']);
    }

    public function storeResumes(ResumesFieldsRequest $request)
    {

        Perform::store(Resume::class, ResumeField::class, $request, 'resume_id');

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
}
