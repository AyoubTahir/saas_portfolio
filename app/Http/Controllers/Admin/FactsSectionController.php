<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fact;
use App\Models\FactField;
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
        $fact = Fact::where('user_id', Auth::id())->with('factsField')->first();

        return view('admin.homepage.fact', compact(['fact']));
    }

    public function updatefactsSection(FactsRequest $request)
    {
        $currentUserFacts =  Fact::where('user_id', Auth::id())->first();

        $request['user_id'] = Auth::id();

        $data = $request->only($this->factsFields());
        //dd($data);
        if ($currentUserFacts) {
            (new SaveModel($currentUserFacts, $data))->execute();
        } else {
            (new SaveModel(new Fact(), $data))->execute();
        }

        return redirect()->route('home.facts')->with(['success' => 'changed updated successfully']);
    }

    public function storefacts(FactsFieldsRequest $request)
    {
        $currentUserFacts =  Fact::where('user_id', Auth::id())->first();

        if ($currentUserFacts) {
            $request['fact_id'] = $currentUserFacts->id;

            $data = $request->only($this->factsFieldFields());

            (new SaveModel(new FactField(), $data))->execute();
        }

        return redirect()->route('home.facts')->with(['success' => 'changed updated successfully']);
    }

    public function editfacts($id)
    {
        $factsField = FactField::findorfail($id);

        return redirect()->route('home.facts')->with(['success' => 'facts Field has been updated.']);
    }

    public function deletefacts($id)
    {
        //dd($id);
        $factsField = FactField::findorfail($id);

        $factsField->delete();

        return redirect()->route('home.facts')->with(['success' => 'facts Field has been deleted.']);
    }

    public function destroyfacts(Request $request)
    {
        FactField::destroy($request->ids);

        return redirect()->route('home.facts')->with(['success' => 'facts Fields has been deleted.']);
    }

    private function factsFields()
    {
        return [
            'user_id',
            'title_ar',
            'title_en',
            'cover',
            'status'
        ];
    }

    private function factsFieldFields()
    {
        return [
            'fact_id',
            'title_ar',
            'title_en',
            'number',
            'icon',
        ];
    }
}
