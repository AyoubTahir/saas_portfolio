<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use App\Models\Expertise;
use App\Services\Perform;
use Illuminate\Http\Request;
use App\Models\ExpertiseField;
use App\Http\Controllers\Controller;
use App\Http\Requests\SkillsRequest;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ExpertisesRequest;
use App\Http\Requests\ExpertisesFieldsRequest;

class ExpertisesSectionController extends Controller
{
    public function expertisesSection()
    {
        $expertise = Perform::index(Expertise::class, 'expertisesField.skills');

        return view('admin.homepage.expertise', compact(['expertise']));
    }

    public function updateExpertisesSection(ExpertisesRequest $request)
    {
        Perform::update(Expertise::class, $request);

        return redirect()->route('home.expertises')->with(['success' => 'changed updated successfully']);
    }

    public function storeExpertises(ExpertisesFieldsRequest $request)
    {

        Perform::store(Expertise::class, ExpertiseField::class, $request, 'expertise_id');

        return redirect()->route('home.expertises')->with(['success' => 'changed updated successfully']);
    }

    public function editExpertises($id)
    {
        $expertisesField = ExpertiseField::findorfail($id);

        return redirect()->route('home.expertises')->with(['success' => 'expertises Field has been updated.']);
    }

    public function deleteExpertises($id)
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

    public function storeSkillExpertises(SkillsRequest $request)
    {

        $currentUserExpertise =  ExpertiseField::where('id', $request->expertise_field_id)->first();

        if ($currentUserExpertise) {

            $data = $request->only($this->skillsFields());

            (new SaveModel(new Skill(), $data))->execute();
        }

        return redirect()->route('home.expertises')->with(['success' => 'changed updated successfully']);
    }

    public function editSkillExpertises($id)
    {
        $skillField = Skill::findorfail($id);

        return redirect()->route('home.expertises')->with(['success' => 'expertises Field has been updated.']);
    }

    public function deleteSkillExpertises($id)
    {
        $skillField = Skill::findorfail($id);

        $skillField->delete();

        return redirect()->route('home.expertises')->with(['success' => 'expertises Field has been deleted.']);
    }

    public function destroySkillExpertises(Request $request)
    {
        Skill::destroy($request->ids);

        return redirect()->route('home.expertises')->with(['success' => 'expertises Fields has been deleted.']);
    }

    private function skillsFields()
    {
        return [
            'expertise_field_id',
            'skill_ar',
            'skill_en',
            'lvl',
        ];
    }
}
