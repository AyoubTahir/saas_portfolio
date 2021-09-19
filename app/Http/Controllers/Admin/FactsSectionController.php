<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fact;
use App\Models\FactField;
use App\Services\Perform;
use Illuminate\Http\Request;
use App\Http\Requests\FactsRequest;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FactsFieldsRequest;

class FactsSectionController extends Controller
{
    public function factsSection()
    {
        $fact = Perform::index(Fact::class, 'factsField');

        return view('admin.homepage.fact', compact(['fact']));
    }

    public function updatefactsSection(FactsRequest $request)
    {
        Perform::update(Fact::class, $request);

        return redirect()->route('home.facts')->with(['success' => 'changed updated successfully']);
    }

    public function storefacts(FactsFieldsRequest $request)
    {
        Perform::store(Fact::class, FactField::class, $request, 'fact_id');

        return redirect()->route('home.facts')->with(['success' => 'changed updated successfully']);
    }

    public function editfacts($id)
    {
        $factsField = FactField::findorfail($id);

        return redirect()->route('home.facts')->with(['success' => 'facts Field has been updated.']);
    }

    public function deletefacts($id)
    {
        $factsField = FactField::findorfail($id);

        $factsField->delete();

        return redirect()->route('home.facts')->with(['success' => 'facts Field has been deleted.']);
    }

    public function destroyfacts(Request $request)
    {
        FactField::destroy($request->ids);

        return redirect()->route('home.facts')->with(['success' => 'facts Fields has been deleted.']);
    }
}
