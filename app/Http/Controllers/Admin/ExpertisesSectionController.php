<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expertise;
use Illuminate\Http\Request;
use App\Models\ExpertiseField;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExpertisesRequest;
use App\Http\Requests\ExpertisesFieldsRequest;

class ExpertisesSectionController extends Controller
{
    public function expertisesSection()
    {
        $expertise = Expertise::where('user_id', Auth::id())->with('expertisesField')->first();

        return view('admin.homepage.expertise', compact(['expertise']));
    }

    public function updateExpertisesSection(ExpertisesRequest $request)
    {
        $currentUserExpertises =  Expertise::where('user_id', Auth::id())->first();

        $request['user_id'] = Auth::id();

        $data = $request->only($this->expertisesFields());

        if ($currentUserExpertises) {
            (new SaveModel($currentUserExpertises, $data))->execute();
        } else {
            (new SaveModel(new expertise(), $data))->execute();
        }

        return redirect()->route('home.expertises')->with(['success' => 'changed updated successfully']);
    }

    public function storeExpertises(ExpertisesFieldsRequest $request)
    {
        $currentUserExpertises =  Expertise::where('user_id', Auth::id())->first();

        if ($currentUserExpertises) {
            $request['expertise_id'] = $currentUserExpertises->id;
            $request['icon'] = 'fffff';

            $data = $request->only($this->expertisesFieldFields());

            (new SaveModel(new ExpertiseField(), $data))->execute();
        }

        return redirect()->route('home.expertises')->with(['success' => 'changed updated successfully']);
    }

    public function editExpertises($id)
    {
        $expertisesField = ExpertiseField::findorfail($id);

        return redirect()->route('home.expertises')->with(['success' => 'expertises Field has been updated.']);
    }

    public function deleteexpertises($id)
    {
        $expertisesField = ExpertiseField::findorfail($id);

        $expertisesField->delete();

        return redirect()->route('home.expertises')->with(['success' => 'expertises Field has been deleted.']);
    }

    public function destroyExpertises(Request $request)
    {
        ExpertiseField::destroy($request->ids);

        return redirect()->route('home.expertises')->with(['success' => 'expertises Fields has been deleted.']);
    }

    private function expertisesFields()
    {
        return [
            'user_id',
            'title_ar',
            'title_en',
            'description_ar',
            'description_en',
            'image',
            'status'
        ];
    }

    private function expertisesFieldFields()
    {
        return [
            'expertise_id',
            'name_ar',
            'name_en',
        ];
    }
}
