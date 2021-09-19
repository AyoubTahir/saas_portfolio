<?php

namespace App\Http\Controllers\Admin;

use App\Models\Interest;
use App\Services\Perform;
use Illuminate\Http\Request;
use App\Models\InterestField;
use App\Http\Controllers\Controller;
use App\Http\Requests\InterestRequest;
use App\Http\Requests\InterestFieldsRequest;

class InterestSectionController extends Controller
{
    public function interestSection()
    {
        $interest = Perform::index(Interest::class, 'interestField');

        return view('admin.homepage.interest', compact(['interest']));
    }

    public function updateInterestSection(InterestRequest $request)
    {
        Perform::update(Interest::class, $request);

        return redirect()->route('home.interest')->with(['success' => 'changed updated successfully']);
    }

    public function storeInterest(InterestFieldsRequest $request)
    {
        Perform::store(Interest::class, InterestField::class, $request, 'interest_id');

        return redirect()->route('home.interest')->with(['success' => 'changed updated successfully']);
    }

    public function editInterest($id)
    {
        $interestField = InterestField::findorfail($id);

        return redirect()->route('home.interest')->with(['success' => 'Interest Field has been updated.']);
    }

    public function deleteInterest($id)
    {
        $interestField = InterestField::findorfail($id);

        $interestField->delete();

        return redirect()->route('home.interest')->with(['success' => 'Interest Field has been deleted.']);
    }

    public function destroyInterest(Request $request)
    {
        InterestField::destroy($request->ids);

        return redirect()->route('home.interest')->with(['success' => 'Interest Fields has been deleted.']);
    }
}
