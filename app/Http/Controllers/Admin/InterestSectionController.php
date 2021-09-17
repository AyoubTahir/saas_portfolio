<?php

namespace App\Http\Controllers\Admin;

use App\Models\Interest;
use Illuminate\Http\Request;
use App\Models\InterestField;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InterestRequest;
use App\Http\Requests\InterestFieldsRequest;

class InterestSectionController extends Controller
{
    public function interestSection()
    {
        $interest = Interest::where('user_id', Auth::id())->with('interestField')->first();

        return view('admin.homepage.interest', compact(['interest']));
    }

    public function updateInterestSection(InterestRequest $request)
    {
        $currentUserInterest =  Interest::where('user_id', Auth::id())->first();

        $request['user_id'] = Auth::id();

        $data = $request->only($this->interestFields());

        if ($currentUserInterest) {
            (new SaveModel($currentUserInterest, $data))->execute();
        } else {
            (new SaveModel(new interest(), $data))->execute();
        }

        return redirect()->route('home.interest')->with(['success' => 'changed updated successfully']);
    }

    public function storeInterest(InterestFieldsRequest $request)
    {
        $currentUserInterest =  Interest::where('user_id', Auth::id())->first();

        if ($currentUserInterest) {
            $request['interest_id'] = $currentUserInterest->id;

            $data = $request->only($this->interestFieldFields());

            (new SaveModel(new InterestField(), $data))->execute();
        }

        return redirect()->route('home.interest')->with(['success' => 'changed updated successfully']);
    }

    public function editInterest($id)
    {
        $interestField = InterestField::findorfail($id);

        return redirect()->route('home.interest')->with(['success' => 'Interest Field has been updated.']);
    }

    public function deleteInterest($id)
    {
        //dd($id);
        $interestField = InterestField::findorfail($id);

        $interestField->delete();

        return redirect()->route('home.interest')->with(['success' => 'Interest Field has been deleted.']);
    }

    public function destroyInterest(Request $request)
    {
        InterestField::destroy($request->ids);

        return redirect()->route('home.interest')->with(['success' => 'Interest Fields has been deleted.']);
    }

    private function interestFields()
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

    private function interestFieldFields()
    {
        return [
            'interest_id',
            'name_ar',
            'name_en',
            'icon',
        ];
    }
}
