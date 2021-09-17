<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Models\ServiceField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServicesRequest;
use App\Http\Requests\ServicesFieldsRequest;

class ServicesSectionController extends Controller
{
    public function servicesSection()
    {
        $service = Service::where('user_id', Auth::id())->with('servicesField')->first();

        return view('admin.homepage.service', compact(['service']));
    }

    public function updateservicesSection(ServicesRequest $request)
    {
        $currentUserServices =  Service::where('user_id', Auth::id())->first();

        $request['user_id'] = Auth::id();

        $data = $request->only($this->servicesFields());

        if ($currentUserServices) {
            (new SaveModel($currentUserServices, $data))->execute();
        } else {
            (new SaveModel(new Service(), $data))->execute();
        }

        return redirect()->route('home.services')->with(['success' => 'changed updated successfully']);
    }

    public function storeServices(ServicesFieldsRequest $request)
    {
        $currentUserServices =  Service::where('user_id', Auth::id())->first();

        if ($currentUserServices) {
            $request['service_id'] = $currentUserServices->id;

            $data = $request->only($this->servicesFieldFields());

            (new SaveModel(new ServiceField(), $data))->execute();
        }

        return redirect()->route('home.services')->with(['success' => 'changed updated successfully']);
    }

    public function editServices($id)
    {
        $servicesField = ServiceField::findorfail($id);

        return redirect()->route('home.services')->with(['success' => 'services Field has been updated.']);
    }

    public function deleteServices($id)
    {
        $servicesField = ServiceField::findorfail($id);

        $servicesField->delete();

        return redirect()->route('home.services')->with(['success' => 'services Field has been deleted.']);
    }

    public function destroyServices(Request $request)
    {
        ServiceField::destroy($request->ids);

        return redirect()->route('home.services')->with(['success' => 'services Fields has been deleted.']);
    }

    private function servicesFields()
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

    private function servicesFieldFields()
    {
        return [
            'service_id',
            'name_ar',
            'name_en',
            'desc_ar',
            'desc_en',
            'icon'
        ];
    }
}
